<x-app-layout>
    <table class="table">
       
        <tbody>
            @foreach($sinhVien as $key => $value)
                    <tr>
                       
                        <td>Mã SV : {{ $value ->ma_sv}}</td>
                        <td>Tên : {{ $value ->ten}}</td>
                        <td>Lớp :{{ $value ->lop}}</td>
                        <td>Điểm TB :{{ $value ->diem_tb}}</td>
                        <td>Chuyên ngành :{{ $value ->chuyen_nganh}}</td>
                        <td>Kỳ học :{{ $value ->ky_hoc}}</td>
                        <td>
                            <a href="">Quay lại</a>
                        </td>
                    </tr>
            @endforeach
            
        </tbody>
    </table>
</x-app-layout>