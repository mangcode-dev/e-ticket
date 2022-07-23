<div class="col-sm-12 col-md-12 col-xl-12">
	<div class="card-box">
		<div class="card-head">
			<header>Department List</header>
		</div>
		<div class="card-body ">
			<div class="state-overview">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="overview-panel bg-b-green">
							<div class="symbol">
								<i class="fa fa-users usr-clr"></i>
							</div>
							<div class="value white">
								<p class="sbold addr-font-h1" id="detail--al" data-counter="counterup" data-value="0">0</p>
								<p>TOTAL MEMBER</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="overview-panel bg-b-yellow">
							<div class="symbol">
								<i class="fa fa-user"></i>
							</div>
							<div class="value white">
								<p class="sbold addr-font-h1" id="detail--ac" data-counter="counterup" data-value="0">0</p>
								<p>ACTIVE MEMBER</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="overview-panel bg-b-pink">
							<div class="symbol">
								<i class="fa fa-heartbeat"></i>
							</div>
							<div class="value white">
								<p class="sbold addr-font-h1" id="detail--ua" data-counter="counterup" data-value="0">0</p>
								<p>INACTIVE MEMBER</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="overview-panel bg-b-blue">
							<div class="symbol">
								<i class="fa fa-sign-in"></i>
							</div>
							<div class="value white">
								<p class="sbold addr-font-h1" id="detail--ud" data-counter="counterup" data-value="0">0</p>
								<p>TODAY MEMBER</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-6">
					<div class="btn-group">
						<a href="<?= base_url() ?>User/add" id="addRow" class="btn btn-primary">
							Add New <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="usertb4" aria-describedby="example4_info"></table>
		</div>
	</div>
</div>

