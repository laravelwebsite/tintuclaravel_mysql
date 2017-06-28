 @extends('admin.layout.index')

 @section('content')
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>There were some problems with your input! <br><br>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul> 
                    </div>
                    @endif

                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        <strong>{{session('thongbao')}}</strong>
                    </div>
                    @endif
                    @if(session('loi'))
                    <div class="alert alert-danger">
                        <strong>{{session('loi')}}</strong>
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="theloai">
                        <!-- -->
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}"
                               
                                @if ($tintuc->loaitin->theloai->id==$tl->id) 
                                        {{"selected"}}
                                @endif 
                            >{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                         @foreach($loaitin as $lt)
                         <option value="{{$lt->id}}"
                                @if ($tintuc->idLoaiTin==$lt->id) 
                                        {{"selected"}}
                                @endif 
                         >{{$lt->Ten}}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" value="{{$tintuc->TieuDe}}" name="TieuDe" placeholder="Nhập tiêu đề" />
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea id="demo" class="ckeditor form-control"  rows="3" name="TomTat">{{$tintuc->TomTat}}</textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="demo" class="ckeditor form-control"  rows="10" name="NoiDung">{{$tintuc->NoiDung}}</textarea>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="" width="400px"><br>
                    <input type="file" name="Hinh" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nổi bật</label>
                    <label class="radio-inline">
                        <input name="NoiBat" value="0" checked="true" type="radio"
                            @if($tintuc->NoiBat==0)
                                    {{"checked"}}
                            @endif
                        >Không
                    </label>
                    <label class="radio-inline">
                        <input name="NoiBat" value="1" type="radio"
                            @if($tintuc->NoiBat==1)
                                    {{"checked"}}
                            @endif
                        >Có
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Category Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                @if(session('thongbao'))
                <div class="alert alert-success">
                    <strong>{{session('thongbao')}}</strong>
                </div>
                @endif 
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        @foreach($tintuc->comment as $cm)
                        <td>{{$cm->id}}</td>
                        <td>{{$cm->user->name}}</td>
                        <td>{{$cm->NoiDung}}</td>
                        <td>{{$cm->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"> Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection

