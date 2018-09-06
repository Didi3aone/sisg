<!-- Modal Tambah Badan Usaha-->
<div class="modal fade" id="mMap" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					MAP
				</h4>
			</div>
			<div class="modal-body no-padding">
                <div class="row">
                    <div class="alert alert-info fade in">
						<button class="close" data-dismiss="alert">
							×
						</button>
						<i class="fa-fw fa fa-info"></i>
						<strong>Info!</strong> geser marker / ketik alamat / isi latitude dan longitude untuk menentukan lokasi
					</div>
                    <div class="col-xs-12">
                        <form class="smart-form" action="#" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <section>
                                    <label class="label">Full address </label>
                                    <label class="textarea">
                                        <textarea id="full_address" name="full_address"></textarea>
                                    </label>
                                </section>
                                <div class="row">
									<section class="col col-6">
										<label class="label">Latitude </label>
										<label class="input">
											<input name="latitude" id="latitude" type="text" class="form-control" placeholder="Latitude" value="" />
										</label>
									</section>
                                    <section class="col col-6">
                                        <label class="label">Longitude </label>
                                        <label class="input">
											<input name="longitude" id="longitude" type="text" class="form-control" placeholder="Longitude" value="" />
										</label>
                                    </section>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-xs-12">
                        <div id="map" style="height:400px;"></div>
                    </div>
                </div>


			</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="mBtnSave" class="btn btn-primary">Save</button>
            </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
