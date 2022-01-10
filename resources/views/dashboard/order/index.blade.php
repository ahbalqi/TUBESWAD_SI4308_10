@extends('layout/admin')

@section('content')

	<div class="row mt-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h6>PESANAN</h6>
				</div>
				<div class="card-body">

					@if (session('alert'))
					    <div class="row mt-4">
					    	<div class="col-md-12">
						        {!! session('alert') !!}
						    </div>
					    </div>
					@endif

					@if($errors->any())
						<div class="alert alert-danger mt-3">
						    {!! implode('', $errors->all('<div>:message</div>')) !!}
						</div>
					@endif

		            <table class="table table-hover mt-4">
		                <thead class="bg-primary text-white">
		                  <tr>
		                    <th style="width: 5%">No</th>
		                    <th>Kode Pesanan</th>
		                    <th>Nama Pemesan</th>
		                    <th>Tanggal</th>
		                    <th class="text-center">Total Harga</th>
		                    <th class="text-center">Status</th>
		                    <th style="width: 10%">Action</th>
		                  </tr>
		                </thead>
		                <tbody>

		                  <?php $n= 1;
		                    foreach ($order as $row) { ?>
		                      <tr>
		                        <td><?= $n++ ?></td>
		                        <td><?= $row->order_code ?></td>
		                        <td><?= $row->nama ?><br><small class="text-muted"><?= $row->email ?></small></td>
		                        <td><?= indonesian_date($row->order_date) ?></td>
		                        <td class="text-right"><?= format_rp($row->order_total) ?></td>
		                        <td class="text-center"><?= get_status_order($row->order_status) ?></td>
		                        <td>
		                          <a href="/dashboard/order/<?= $row->order_id ?>" class="btn btn-outline-primary btn-sm">Lihat</a>
		                        </td>
		                      </tr>
		                  <?php  }
		                  ?>
		                </tbody>
		              </table>

				</div>
			</div>
		</div>
	</div>
@endsection