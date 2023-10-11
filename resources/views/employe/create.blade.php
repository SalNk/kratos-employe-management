@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Employé</h1>
				<hr class="mb-4">
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-4">
						<h3 class="section-title">General</h3>
						<div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">

							<div class="app-card-body">
								<form class="settings-form">
                                    <div class="mb-3">
										<label for="setting-input-2" class="form-label">Département</label>
										<select name="departement_id" id="departement_id" class="form-control">
                                            <option value=""></option>
                                        </select>
									</div>
									<div class="mb-3">
										<label for="setting-input-1" class="form-label">Nom</label>
										<input type="text" class="form-control" id="setting-input-1"
											placeholder="Saisir le Nom" required>
									</div>
									<div class="mb-3">
										<label for="setting-input-2" class="form-label">Prénom</label>
										<input type="text" class="form-control" id="setting-input-2" placeholder="Saisir le Prénom"
											required>
									</div>
									<div class="mb-3">
										<label for="setting-input-3" class="form-label">Email</label>
										<input type="email" class="form-control" id="setting-input-3" placeholder="Saisir le mail">
									</div>
									<div class="mb-3">
										<label for="setting-input-3" class="form-label">Téléphone</label>
										<input type="email" class="form-control" id="setting-input-3"
											placeholder="Saisir le numéro de Téléphone">
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