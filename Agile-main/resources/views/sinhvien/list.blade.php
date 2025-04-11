<x-app-layout>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sinh Viên</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Điểm Trung Bình</th>
                <th>Chuyên Ngành</th>
                <th>Kỳ Học</th>
                <th>Công cụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sinhVien as $key => $value)
                    <tr>
                        <td>{{ $key + 1}}</td>
                        <td>{{ $value ->ma_sv}}</td>
                        <td>{{ $value ->ten}}</td>
                        <td>{{ $value ->lop}}</td>
                        <td>{{ $value ->diem_tb}}</td>
                        <td>{{ $value ->chuyen_nganh}}</td>
                        <td>{{ $value ->ky_hoc}}</td>
                        <td>
                            <a href="{{route('sinhvien.show',$value->id)}}">Xem chi tiết</a>
                            <a href="">Sửa</a>
                            <a href="">Xóa</a>
                        </td>
                    </tr>
            @endforeach
            
        </tbody>
    </table>
</x-app-layout>