@extends('layouts.app')

@section('content')

<div class="uk-container uk-container-xsmall">
	<h1 class="uk-text-center uk-heading-primary">Pengeluaran</h1>

	<hr class="uk-divider-icon">
<form method="POST" class="uk-form-horizontal uk-margin-large" action="{{ route('keluar.store') }}" enctype="multipart/form-data" >
    @csrf
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Nominal</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="nominal" id="form-horizontal-text" type="number" required autofocus>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Keterangan</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="ket" id="form-horizontal-text" type="text" required autofocus>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text">Tanggal</label>
        <div class="uk-form-controls">
            <input class="uk-input" name="tanggal" id="form-horizontal-text" type="date" required autofocus>
        </div>
    </div>
        <div class="uk-margin">
        	<button class="uk-float-right uk-text-right uk- uk-button uk-button-primary">OK</button>
        </div>
</form>
	<hr class="uk-divider-icon">

</div>

@endsection