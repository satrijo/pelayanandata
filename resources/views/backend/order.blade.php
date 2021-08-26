<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permohonan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg justify-center">
                <div class="p-6 bg-white border-b border-gray-200">


                    {{-- start of line --}}
                    <div class="mt-5">
                        <h2 class="mb-4">Daftar Permohonan Data</h2>
                        <table class="yajra-datatable min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pembayaran</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Permohonan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

                    <script type="text/javascript">
                    $(function () {

                        var table = $('.yajra-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            order: [[0, 'desc']],
                            ajax: "{{ route('permohonanjson') }}",
                            columns: [
                                {data: 'invoice', name: 'invoice'},
                                {data: 'nik', name: 'nik'},
                                {data: 'nama', name: 'nama'},
                                {data: 'email', name: 'email'},
                                {data: 'jenispelayanan', name: 'jenispelayanan'},
                                {data: 'pembayaran', name: 'pembayaran'},
                                {data: 'status', name: 'status'},
                                {data: 'created_at', name: 'created_at'},
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: true,
                                    searchable: true
                                },
                            ]
                        });

                    });
                    </script>


                    {{-- end of line --}}



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
