<section class="section">
    <div class="card">
        <div class="card-header">
        Kullanıcılar
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Adı</th>
                    <th>Email</th>
                    <th>Tel No</th>
                    <th>Fakülte</th>
                    <th>Bölüm</th>
                    <th>Onay Durumu</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->tel_no}}</td>
                        <td>{{$user->getFakulte->adi}}</td>
                        <td>{{$user->getBolum->bolum_adi}}</td>
                        <td>
                            <input class="switch" @if($user->onay==1) checked @endif type="checkbox" article-id="{{$user->id}}" data-on="Aktif" data-off="Pasif" data-offstyle="danger" data-onstyle="success" data-toggle="toggle">
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</section>

<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mezun Bilgi Sistemi</p>
        </div>
        <div class="float-end">
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{asset('backend/dist/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('backend/dist/')}}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('backend/dist/')}}/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="{{asset('backend/dist/')}}/assets/js/pages/dashboard.js"></script>

<script src="{{asset('backend/dist/')}}/assets/js/main.js"></script>
<script src="{{asset('backend/dist/')}}/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);


</script>
<script>
    $('.switch').change(function() {
        id = $(this)[0].getAttribute('article-id');
        statu = $(this).prop('checked');
        $.get("{{url('admin/user/switch')}}/"+id, {statu:statu}, function (data,status){});
    });
</script>
</body>

</html>
