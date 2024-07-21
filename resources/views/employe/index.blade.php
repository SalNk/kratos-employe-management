@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Employés</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="row gx-1 align-items-center" action={{ route('employe.search') }}
                                    method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="word"
                                            class="form-control search-orders" placeholder="Rechercher">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto d-flex place-items-center align-items-center justify-content-center">
                                <a class="btn app-btn-secondary" href={{ route('employe.create') }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="py-auto" width="20px">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    Ajouter
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->


            {{-- <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                    href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Employés</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                    href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
                    href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                    href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
                    aria-selected="false">Cancelled</a>
            </nav> --}}

            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">id</th>
                                            <th class="cell">Nom</th>
                                            <th class="cell">Prénom</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Contact</th>
                                            <th class="cell">Département</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employes as $employe)
                                            <tr>
                                                <td class="cell">{{ $employe->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $employe->nom }}</span></td>
                                                <td class="cell">{{ $employe->prenom }}</td>
                                                <td class="cell">{{ $employe->email }} </td>
                                                <td class="cell">{{ $employe->contact }}</td>
                                                <td class="cell">{{ $employe->departement->name }}</td>
                                                <td class="cell">
                                                    <a class="btn-sm app-btn-secondary"
                                                        href={{ route('employe.edit', $employe->id) }}>Modifier</a>
                                                    <a class="btn-sm app-btn-secondary"
                                                        href={{ route('employe.delete', $employe->id) }}>Retirer</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="cell text-center h4 p-4" colspan="6">Aucun employé trouvé</td>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            {{ $employes->links() }}
                            </li>
                        </ul>
                    </nav><!--//app-pagination-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
