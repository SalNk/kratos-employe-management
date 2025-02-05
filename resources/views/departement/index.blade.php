@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Départements</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="row gx-1 align-items-center" action={{ route('departement.search') }}
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
                                <a class="btn app-btn-secondary" href={{ route('departement.create') }}>
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
                                            <th class="cell">Nombre d'employés</th>
                                            <th class="cell">Status</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Début de la boucle -->
                                        @forelse ($departements as $departement)
                                            <!-- La vue avec le contenu de la variable départements-->
                                            <tr>
                                                <td class="cell">{{ $departement->id }} </td>
                                                <td class="cell"><span class="truncate">{{ $departement->name }}</span>
                                                </td>
                                                <td class="cell">
                                                    {{ $departement->employes->count() }}
                                                </td>
                                                </td>
                                                <td class="cell">
                                                    <span
                                                        class="px-2 text-white
                                                        {{ $departement->status == 'Actif' ? 'bg-success' : '' }} 
                                                        {{ $departement->status == 'Suspendu' ? 'bg-danger' : 'bg-secondary' }} 
                                                     ">
                                                        {{ $departement->status }}
                                                    </span>
                                                </td>
                                                <td class="cell">
                                                    <a class="btn-sm app-btn-secondary"
                                                        href={{ route('departement.edit', $departement->id) }}>Modifier</a>
                                                    <a class="btn-sm app-btn-secondary"
                                                        href={{ route('departement.delete', $departement->id) }}>Retirer</a>
                                                </td>
                                            </tr>

                                            <!-- Renvoie une vue quand le contenu de la variable départements est vide -->
                                        @empty
                                            <tr>
                                                <td class="cell text-center h4 p-4" colspan="6">Aucun département trouvé
                                                </td>
                                                </td>
                                            </tr>
                                            <!-- Fin de la boucle -->
                                        @endforelse
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            {{ $departements->links() }}
                            </li>
                        </ul>
                    </nav><!--//app-pagination-->

                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->

    <script>
        < script >
        @endsection
