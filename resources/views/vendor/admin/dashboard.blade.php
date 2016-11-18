@extends('admin::layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<?php $customers = \App\Models\Customer::all(); ?>
<?php $epc = \App\Models\User\Epc::all(); ?>
<?php $ss = \App\Models\User\SalesService::all(); ?>
<?php $orders = \App\Models\Order\Partial::orderBy('created_at', 'desc'); ?>
<?php $orders = (\Request::input('search')) ? ($orders->where('order_number', \Request::input('search'))) : $orders; ?>
<?php $orders = $orders->paginate(10);?>
<?php
$usersChart = Lava::DataTable();

$usersChart->addDateColumn('Day of Month')
->addNumberColumn('EPC')
->addNumberColumn('CUS')
->addNumberColumn('SS');

$users = \App\Models\User\Log::selectRaw("YEAR(sign_in) as year, MONTH(sign_in) as month")
->join('users', 'user_logs.user_id', '=', 'users.id')->groupBy('year', 'month')->where('sign_in', 'like', date('Y').'%')->get();
for ($a = 1; $a < 13; $a++)
{
    $year = date('Y');
    $date = $year.'-'.$a.'-00';
    $month = str_pad($a, 2, '0', STR_PAD_LEFT);
    $rowData = array(
        "$date", ($logs = \App\Models\User\Log::selectRaw("YEAR(sign_in) as year, MONTH(sign_in) as month, count(user_logs.id) as total")
            ->join('users', 'user_logs.user_id', '=', 'users.id')->groupBy('user_type')->whereRaw('YEAR(sign_in) = "'.$year.'"')
            ->whereRaw('MONTH(sign_in) = "'.$month.'"')->where('users.user_type', 'EPC')->first()) ? $logs->total: 0,
        ($logs = \App\Models\User\Log::selectRaw("YEAR(sign_in) as year, MONTH(sign_in) as month, count(user_logs.id) as total")
            ->join('users', 'user_logs.user_id', '=', 'users.id')->groupBy('user_type')->whereRaw('YEAR(sign_in) = "'.$year.'"')
            ->whereRaw('MONTH(sign_in) = "'.$month.'"')->where('users.user_type', 'CUS')->first()) ? $logs->total: 0,
        ($logs = \App\Models\User\Log::selectRaw("YEAR(sign_in) as year, MONTH(sign_in) as month, count(user_logs.id) as total")
            ->join('users', 'user_logs.user_id', '=', 'users.id')->groupBy('user_type')->whereRaw('YEAR(sign_in) = "'.$year.'"')
            ->whereRaw('MONTH(sign_in) = "'.$month.'"')->where('users.user_type', 'SS')->first()) ? $logs->total: 0
        );
    $usersChart->addRow($rowData);
}

$lineChart = Lava::LineChart('Users')
->setOptions(array(
    'datatable' => $usersChart,
    'title' => 'User Login Trends'
    ));

    ?>
    <div class="row row-xs">
        <div class="col-sm-8">
            <div class="panel panel-card p m-b-sm">
                {!! Lava::render('LineChart', 'Users', 'users-chart-div') !!}
                <div id="users-chart-div" style="height:340px"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-card">
                <div class="p">Users</div>
                <div class="panel-body text-center">
                    <div class="m-v-lg">
                        Total Customers
                        <div class="h2 text-success font-bold">{{ count($customers) }}</div>
                    </div>
                    <div class="m-v-lg">
                        Total EPC
                        <div class="h2 text-success font-bold">{{ count($epc) }}</div>
                    </div>
                    <div class="m-v-lg">
                        Total Sales Services
                        <div class="h2 text-success font-bold">{{ count($ss) }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row row-xs">
        <div class="col-md-12">
            <div class="panel panel-card">
                <div class="panel-heading b-b b-light">Orders</div>
                <div class="panel-body">
                  <form method="GET">
                    <label>Search</label>
                    <input class="input-sm form-control" name="search" id="items" >
                </form>
            </div>
            <table st-table="rowCollectionPage" class="table table-striped">
              <thead>
                <tr>
                  <th st-sort="firstName">Order Number / Order Partial Number</th>
                  <th st-sort="lastName">Order Date</th>
                  <th st-sort="birthDate">Customer Name</th>
                  <th st-sort="balance">Shipping Fee</th>
                  <th>Total</th>
              </tr>
          </thead>
          <tbody>
            @foreach($orders as $row)
            <tr>
                <td>{{@$row->order->order_number}}/{{@$row->order_number}}</td>
                <td>{{@Carbon::parse($row->created_at)->format('d F Y')}}</td>
                <td>{{@$row->order->customer->name}}</td>
                <td>{{@App\Site::money($row->shipping_amount)}}</td>
                <td><a href="">{{ @App\Site::money($row->total_amount) }}</a></td>
            </tr>
            @endforeach

        </tbody>
        @include('admin::pagination.default', ['paginator' => $orders])
    </table>
</div>
</div>
</div>
@endsection