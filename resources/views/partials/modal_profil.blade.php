<!-- Modal -->
<div class="modal fade" id="model-profile{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('perjalanan.profile', $p->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Foto</label>
                                </div>

                                <div class="col-8">

                                    <input type="file" class="form-control" name="foto" id="inputFoto"
                                        aria-describedby="helpId" placeholder="Masukkan foto">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Nama</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="nama" id="" aria-describedby="helpId"
                                        placeholder="Masukkan Nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Email</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="email" id="" aria-describedby="helpId"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Sekolah</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="sekolah" id="" aria-describedby="helpId"
                                        placeholder="Masukkan Nama Sekolah">
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