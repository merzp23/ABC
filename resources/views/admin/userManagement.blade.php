<x-app-layout>

    <div class="t-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($count>0)
        <div class="d-flex justify-content-end">
            <a href="{{route('admin.userAuthorization')}}">
        <button type="button" class="btn btn-primary position-relative mt-3 ">

            Phê duyệt nhân viên

            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    {{$count}}
  </span>
        </button>
            </a>
        </div>
        @endif
    <table class="py-12 table mt-2">
        <thead>
        <tr>
            <th scope="col">
                Họ và tên
            </th>
            <th scope="col">
                Email
            </th>
            @if($verified==1)

            <th scope="col">
                Ngày sinh
            </th>
            <th scope="col">
                Giới tính
            </th>
            <th scope="col">
                Chức vụ
            </th>
            <th scope="col">
                Phòng ban
            </th>
            @endif
            <th scope="col">

            </th>

        </tr>
        </thead>
        <tbody>
        @if($verified==1)

            @foreach($nhanviens as $nhanvien)
                <tr>
                    <td>{{$nhanvien->name}}</td>
                    <td>{{$nhanvien->email}}</td>
                    <td>{{$nhanvien->NgaySinh}}</td>
                    <td>{{$nhanvien->GioiTinh}}</td>
                    <td>{{$nhanvien->ChucVu}}</td>
                    <td>{{$nhanvien->PhongBan}}</td>
                    <td><a href="{{route('admin.updateUser',['id'=>$nhanvien->id])}}"><button class="btn text-bg-primary">Sửa</button></a></td>

                </tr>
            @endforeach
        @else
            @foreach($nhanviens as $nhanvien)

                <tr>
                <td>{{$nhanvien->name}}</td>
                <td>{{$nhanvien->email}}</td>

                <td><a href="{{route('admin.userApprove',['id'=>$nhanvien->id])}}"><button class="btn btn-success">Phê duyệt</button></a>
                    <a href="{{route('admin.userDelete',['id'=>$nhanvien->id])}}"><button class="btn btn-danger">Không phê duyệt</button></a>
                </td>

            </tr>
            @endforeach
        @endif

        </tbody>
    </table>
        <div class="align-items-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end"> {{-- Thêm justify-content-center để căn giữa --}}
                    {{-- Liên kết đến trang trước --}}
                    @if ($nhanviens->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $nhanviens->previousPageUrl() }}">Previous</a></li>
                    @endif

                    {{-- Các liên kết đến các trang --}}
                    @foreach ($nhanviens->getUrlRange(1, $nhanviens->lastPage()) as $page => $url)
                        <li class="page-item {{ $nhanviens->currentPage() == $page ? ' active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Liên kết đến trang sau --}}
                    @if ($nhanviens->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $nhanviens->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif

                </ul>

            </nav>
        </div>
    </div>

</x-app-layout>
