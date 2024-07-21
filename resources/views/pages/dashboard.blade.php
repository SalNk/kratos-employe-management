@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Dashboard</h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Départements</h4>
                            <div class="stats-figure">{{ $totalDepartements }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/department"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Employes</h4>
                            <div class="stats-figure">{{ $totalEmployes }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="/admin/employe"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total administrateurs</h4>
                            <div class="stats-figure">{{ $totalAdmins }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                {{-- <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Retard de paiement</h4>
                            <div class="stats-figure">6</div>
                            <div class="stats-meta">New</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col--> --}}
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
