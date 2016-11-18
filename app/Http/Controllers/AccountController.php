<?php

namespace App\Http\Controllers;

use App\Models\Account\Achievement;
use App\Models\Account\Commission;
use App\Models\Account\KpCommission;
use App\Models\Account\KpHeader;
use App\Models\Account\Oct;
use App\Models\Account\Profile;
use App\Models\Account\SlipCommission;
use App\Models\Contract;
use App\Models\Contract\Product\Pricelist;
use App\Models\Product;
use App\Site;
use App\User;
use Auth;
use Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        ini_set('max_execution_time', 500);
    }
    public function getIndex(Request $request)
    {
        $model        = new Profile();
        $row          = (Auth::check()) ? ($model->where('rm_rep_id', Auth::user()->epc->email)->first()) : [];
        $year         = ($request->get('year')) ?: Carbon::now()->year;
        $achievements = Achievement::select(\DB::raw('*, RIGHT(periode,2) as month, LEFT(periode,4) as year'))->where('ac_rep_id', Auth::user()->epc->email)
            ->where('periode', 'like', $year . '%')->orderBy('periode', 'desc')->get();
        $commissions = $this->dataCommission($year);
        $unpaid      = KpCommission::where('rp_rep_id', Auth::user()->epc->email)->where('rp_period_year', $year)->where('rp_period_status', 'O')->orderBy('rp_periode', 'desc');
        $profile     = Profile::where('rm_rep_id', Auth::user()->epc->email)->select(\DB::raw('*, TRIM(rm_current_position) as rm_current_position'))->first();
        $orgChart    = new Profile;
        $recruits    = (($profile) ? Profile::where('rm_recruiter_id', $profile->rm_rep_id)->get() : []) ?: [];
        $recruiter   = ($profile) ? Profile::where('rm_rep_id', $profile->rm_recruiter_id)->first() : [];
        $octs        = ($profile) ? Oct::where('ro_rep_id', $profile->rm_rep_id)->get() : [];
        $octr        = ($profile) ? Profile::where('rm_rep_id', $profile->rm_manager_id)->first() : null;
        $years       = Achievement::select(\DB::raw('distinct *, RIGHT(periode,2) as month, LEFT(periode,4) as year'))->where('ac_rep_id', Auth::user()->epc->email)->orderBy('periode', 'desc')->lists('year', 'year');

        return view('account.index', compact('row', 'achievements', 'commissions', 'year', 'unpaid', 'orgChart', 'profile', 'recruits', 'recruiter', 'octs', 'octr', 'years'));
    }

    private function dataCommission($year)
    {
        $commissions = [];
        $total       = 0;
        $psTotal     = 0;
        $msTotal     = 0;
        $slTotal     = 0;
        $raTotal     = 0;
        $riTotal     = 0;
        $promoTotal  = 0;
        $otherTotal  = 0;
        $subTotal    = 0;
        $periode     = '';
        for ($i = 1; $i <= 12; ++$i) {
            $subTotal = 0;
            if (Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->count()) {
                $SCM_PS_COM    = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_PS_COM');
                $SCM_MS_COM    = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_MS_COM');
                $SCM_SL_COM    = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_SL_COM');
                $SCM_RA_COM    = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_RA_COM');
                $SCM_RI_COM    = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_RI_COM');
                $SCM_PR_COM    = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_PR_COM');
                $SCM_OTHER_COM = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->groupBy('SCM_PERIODE')->sum('SCM_OTHER_COM');
                $row           = Commission::where('SCM_REP_EPC', Auth::user()->epc->email)->where('SCM_THN_COM', $year)->where('SCM_BLN_COM', $i)->first();
                //dd($SCM_PS_COM);
                $subTotal += (int) $SCM_PS_COM + (int) $SCM_MS_COM + (int) $SCM_SL_COM + (int) $SCM_RA_COM + (int) $SCM_RI_COM + (int) $SCM_PR_COM + (int) $SCM_OTHER_COM;
                $psTotal += (int) $SCM_PS_COM;
                $msTotal += (int) $SCM_MS_COM;
                $slTotal += (int) $SCM_SL_COM;
                $raTotal += (int) $SCM_RA_COM;
                $riTotal += (int) $SCM_RI_COM;
                $promoTotal += (int) $SCM_PR_COM;
                $otherTotal += (int) $SCM_OTHER_COM;
                $commissions[$row->SCM_BLN_COM] = [
                    'periode'  => date('M, Y', strtotime($row->SCM_PERIODE.'01')),
                    'ps'       => \App\Site::money(((int) $SCM_PS_COM), '', ',', 0) ?: '-',
                    'ms'       => \App\Site::money(((int) $SCM_MS_COM), '', ',', 0) ?: '-',
                    'sl'       => \App\Site::money(((int) $SCM_SL_COM), '', ',', 0) ?: '-',
                    'ra'       => \App\Site::money(((int) $SCM_RA_COM), '', ',', 0) ?: '-',
                    'ri'       => \App\Site::money(((int) $SCM_RI_COM), '', ',', 0) ?: '-',
                    'promo'    => \App\Site::money(((int) $SCM_PR_COM), '', ',', 0) ?: '-',
                    'other'    => \App\Site::money(((int) $SCM_OTHER_COM), '', ',', 0) ?: '-',
                    'subTotal' => \App\Site::money(((int) $subTotal), '', ',', 0) ?: '-',
                ];
            } else {
                $commissions[$i] = [
                    'ps'       => '-',
                    'ms'       => '-',
                    'sl'       => '-',
                    'ra'       => '-',
                    'ri'       => '-',
                    'promo'    => '-',
                    'other'    => '-',
                    'subTotal' => '-',
                    'periode'  => date('M, Y', strtotime($year.str_pad($i, 2, '0', STR_PAD_LEFT).'01')),
                ];
            }
        }

        $commissions += [
            'psTotal'    => \App\Site::money($psTotal, '', ',', 0),
            'msTotal'    => \App\Site::money($msTotal, '', ',', 0),
            'slTotal'    => \App\Site::money($slTotal, '', ',', 0),
            'raTotal'    => \App\Site::money($raTotal, '', ',', 0),
            'riTotal'    => \App\Site::money($riTotal, '', ',', 0),
            'promoTotal' => \App\Site::money($promoTotal, '', ',', 0),
            'otherTotal' => \App\Site::money($otherTotal, '', ',', 0),
            'allTotal'   => \App\Site::money($psTotal + $msTotal + $slTotal + $raTotal + $riTotal + $promoTotal + $otherTotal, '', ',', 0),
        ];

        return $commissions;
    }

    public function getContractList(Contract $contract, Request $request)
    {
        $rows = $contract->where('user_id', Auth::user()->epc->id);
        ($request->start_date == null) ?: $rows->where('created_at', '>=', Carbon::parse($request->start_date)->format('Y-m-d h-i-s'));
        ($request->end_date == null) ?: $rows->where('created_at', '<=', Carbon::parse($request->end_date)->format('Y-m-d h-i-s'));
        ($request->status == null) ?: $rows->where('status', $request->status);
        $rows = $rows->paginate(10);
        return view('account.list', compact('rows'));
    }

    public function getProfilePdf(Profile $profiles, $id, $year)
    {

        $data['year']             = $year;
        $data['data_epc']         = $profiles->where('rm_rep_id', $id)->first();
        $data['data_achievement'] = Achievement::select(\DB::raw('*, RIGHT(periode,2) as month, LEFT(periode,4) as year'))
            ->where('ac_rep_id', Auth::user()->epc->email)
            ->where('periode', 'like', $year . '%')->orderBy('periode')->get();
        $data['data_komisi'] = $this->dataCommission($year);
        $data['data_unpaid'] = KpCommission::where('rp_rep_id', Auth::user()->epc->email)
            ->where('rp_period_status', 'O')
            ->orderBy('rp_periode', 'desc')->get();
        $data['data_achievement_epc'] = $this->getAchievementEPC($id, $year);

        return \PDF::loadView('account.profile-pdf', compact('data'))->download('profile_' . str_slug($data['data_epc']->rm_name) . '' . '_' . date('d-m-Y') . '.pdf');
    }

    public function getTrackingOrder()
    {
        return view('account.tracking_order');
    }

    public function postTrackingOrder(Request $request)
    {
        $kpHeader = KpHeader::where('skh_so_kp_number', $request->kp_number)->first();
        if ($kpHeader) {
            $status = 'processing';
            $row    = $kpHeader;
        } else {
            if ($row = Contract::where('contract_number', $request->kp_number)->first()) {
                $row    = $row;
                $status = 'entry';
            } else {
                return redirect('my-account/tracking-order')->with('message', trans('global.error-order-number'));
            }
        }
        return view('account.tracking_order', compact('row', 'status'));
    }

    public function getTrackingOrderResult()
    {
        return view('account.tracking_order_result');
    }

    public function getDownloadSlip($year, $month)
    {
        $slipCommissions = SlipCommission::where('rp_rep_id', Auth::user()->epc->email)
            ->where('rp_period_year', $year)
            ->where('rp_period_month', (int) $month)
            ->orderBy('rp_date_paid', 'desc')->get();

        // if(($month -1) != 0 && $month == date('m') && $year == date('Y')){
        //   $slipCommissions = $slipCommissions->where(function ($inqry) use ($month) {
        //     $inqry->where('rp_period_month', (int) $month)->orWhere('rp_period_month', (int) $month -1);
        //   });
        // }elseif($year == date('Y') && $month != date('m')){
        //    $slipCommissions = $slipCommissions->where(function ($inqry) use ($month) {
        //     $inqry->where('rp_period_month', (int) $month);
        //   });
        // }else{
        //   $slipCommissions = $slipCommissions->where('rp_period_month', (int) $month);
        // }

        // $slipCommissions = $slipCommissions->orderBy('rp_date_paid', 'desc')->get();

        $slipCommission = $slipCommissions->first();
        return view('account.slip-commission', compact('slipCommissions', 'slipCommission'));
    }

    public function getDownloadOrgChart()
    {
        $model    = new Profile();
        $row      = (Auth::check()) ? $model->where('rm_rep_id', Auth::user()->epc->email)->first() : [];
        $profile  = Profile::where('rm_rep_id', Auth::user()->epc->email)->select(\DB::raw('*, TRIM(rm_current_position) as rm_current_position'))->first();
        $orgChart = new Profile;
        return view('account.pdf_org_chart', compact('row', 'orgChart', 'profile'));
        //return \PDF::loadView('account.pdf_org_chart', compact('row', 'orgChart', 'profile'))->download('org-chart_'.str_slug($profile->rm_name).'.pdf');
    }

    public function getAjaxProductList($categoryId, $paymentType)
    {
        $products      = (Product::where('category_id', $categoryId)->get()) ?: [];
        $priceList     = ['' => 'Pilih Pricelist'] + Pricelist::productList($products->lists('id'))->lists('code', 'code')->toArray();
        $pricelistId   = "";
        $pricelistCode = "";
        if ($paymentType == 'Cash') {
            return response()->json(['html' => view('partial.product_list', compact('products'))->render()]);
        } else {
            return response()->json(['html' => view('partial.product_list_credit', compact('products', 'pricelistId'))->render(), 'pricelist' => view('partial.pricelist', compact('priceList', 'pricelistCode'))->render()]);
        }

    }

    public function getRelease($id)
    {
        Contract::where('id', $id)->update(['status' => 'Released']);

        return redirect()->back()->with('message', 'Data berhasil dikirim!');
    }

    public function getAjaxChangePassword(Request $request)
    {

        if ($request->password) {
            if ($request->password == $request->password_confirmation) {
                User::where('email', Auth::user()->epc->email)->update(['password' => md5($request->password)]);
                return response()->json(['message' => 'Ubah password sukses!']);
            } else {
                return response()->json(['message' => 'Konfirmasi password salah!']);
            }
        }
    }

    public function getAjaxDeleteContract($id)
    {
        Contract::find($id)->delete();
        return redirect()->back()->with('message', 'Kontrak berhasil dihapus!');
    }

    private function getAchievementEPC($username, $year)
    {
        $data = \DB::select("SELECT
              ac_rep_id,
              year,
              SUM(CASE
                WHEN month >=1 AND month <=12 THEN SU ELSE 0
                END) as total_SU,
              SUM(CASE
                WHEN month >=1 AND month <=12 THEN MS ELSE 0
                END) as total_MS,
              SUM(CASE
                WHEN month >=1 AND month <=12 THEN RI ELSE 0
                END) as total_RI,
              SUM(CASE
                WHEN month >=1 AND month <=3 THEN SU ELSE 0
                END) as triwulan_1_SU,
              SUM(CASE
                WHEN month >=4 AND month <=6 THEN SU ELSE 0
                END) as triwulan_2_SU,
              SUM(CASE
                WHEN month >=7 AND month <=9 THEN SU ELSE 0
                END) as triwulan_3_SU,
              SUM(CASE
                WHEN month >=10 AND month <=12 THEN SU ELSE 0
                END) as triwulan_4_SU,
              SUM(CASE
                WHEN month >=1 AND month <=3 THEN MS ELSE 0
                END) as triwulan_1_MS,
              SUM(CASE
                WHEN month >=4 AND month <=6 THEN MS ELSE 0
                END) as triwulan_2_MS,
              SUM(CASE
                WHEN month >=7 AND month <=9 THEN MS ELSE 0
                END) as triwulan_3_MS,
              SUM(CASE
                WHEN month >=10 AND month <=12 THEN MS ELSE 0
                END) as triwulan_4_MS,
              SUM(CASE
                WHEN month >=1 AND month <=3 THEN RI ELSE 0
                END) as triwulan_1_RI,
              SUM(CASE
                WHEN month >=4 AND month <=6 THEN RI ELSE 0
                END) as triwulan_2_RI,
              SUM(CASE
                WHEN month >=7 AND month <=9 THEN RI ELSE 0
                END) as triwulan_3_RI,
              SUM(CASE
                WHEN month >=10 AND month <=12 THEN RI ELSE 0
                END) as triwulan_4_RI,
              SUM(CASE
                WHEN month >=1 AND month <=6 THEN SU ELSE 0
                END) as semester_1_SU,
              SUM(CASE
                WHEN month >=7 AND month <=12 THEN SU ELSE 0
                END) as semester_2_SU,
              SUM(CASE
                WHEN month >=1 AND month <=6 THEN MS ELSE 0
                END) as semester_1_MS,
              SUM(CASE
                WHEN month >=7 AND month <=12 THEN MS ELSE 0
                END) as semester_2_MS,
              SUM(CASE
                WHEN month >=1 AND month <=6 THEN RI ELSE 0
                END) as semester_1_RI,
              SUM(CASE
                WHEN month >=7 AND month <=12 THEN RI ELSE 0
                END) as semester_2_RI
            FROM (
              SELECT
              a.ac_rep_id,
              a.ac_PSSU as SU,
              a.ac_MSSU as MS,
              a.ac_RISU as RI,
              SUBSTRING(a.periode,1,4) AS year,
              convert(substring(a.periode,5,2), UNSIGNED INTEGER) AS month

              FROM tbl_sales_achievement AS a

              ) as tbl_achievement_epc
            WHERE ac_rep_id = '" . $username . "' AND year = '" . $year . "'
            GROUP BY ac_rep_id");

        return $data;
    }

}
