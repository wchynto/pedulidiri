<!-- Modal -->
<div class="modal fade" id="model{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('perjalanan.update', $d->id) }}" method="post">
                    <div class="modal-body">
                    

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Tanggal</label>
                                </div>

                                <div class="col-8">

                                    <input type="date" class="form-control" name="tanggal" id="inputTanggal"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Waktu</label>
                                </div>

                                <div class="col-8">

                                    <input type="time" class="form-control" name="waktu" id="" aria-describedby="helpId"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Lokasi</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="lokasi" id="" aria-describedby="helpId"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Suhu Tubuh</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="suhu_tubuh" id="" aria-describedby="helpId"
                                        placeholder="">
                                </div>
                            </div>
                        </div>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>