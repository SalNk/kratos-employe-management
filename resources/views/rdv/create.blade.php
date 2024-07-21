@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Rendez-vous</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">Information générale</h3>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action={{ route('rdv.store') }} method="POST">
                                @csrf
                                @method('POST')
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="setting-input-1" class="form-label">Titre</label>
                                        <input type="text" class="form-control" id="setting-input-1"
                                            placeholder="Saisir le titre" name="title" value={{ old('title') }}>
                                        @error('title')
                                            <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="setting-input-3" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="setting-input-3"
                                            placeholder="Saisir le mail" name="date" value={{ old('date') }}>
                                        @error('date')
                                            <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="setting-input-1" class="form-label">Status</label>
                                        <select class="form-select w-100" name="status">
                                            <option selected value="Programmé">Programmé</option>
                                            <option value="Passé">Passé</option>
                                            <option value="Annulé">Annulé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="setting-input-2" class="form-label">Description</label>
                                        <input type="textarea" class="form-control" id="setting-input-2"
                                            placeholder="Saisir la description" name="description"
                                            value={{ old('description') }}>
                                        @error('description')
                                            <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn app-btn-primary">Enregistrer</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
