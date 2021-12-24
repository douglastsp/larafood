@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Title</label>
    <input type="text" name="name" class="form-control" id=""
           value="{{ $tenant->name ?? old('name') }}" placeholder="Nome:">
</div>{{-- form-group --}}

<div class="form-group">
    <label for="">E-mail</label>
    <input type="text" name="email" class="form-control" id=""
           value="{{ $tenant->email ?? old('email') }}" placeholder="E-mail:">
</div>{{-- form-group --}}
<div class="form-group">
    <label for="">CNPJ</label>
    <input type="text" name="cnpj" class="form-control" id=""
           value="{{ $tenant->cnpj ?? old('cnpj') }}" placeholder="CNPJ:">
</div>{{-- form-group --}}
<div class="form-group">
    <label for="">Ativo?</label>
    <select name="active" class="form-control" id="">
        <option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selected @endif>SIM</option>
        <option value="N" @if(isset($tenant) && $tenant->active == 'N') selected @endif>NÃO</option>
    </select>
</div>{{-- form-group --}}
<div class="form-group">
    <label for="">Logo</label>
    <input type="file" name="logo" class="form-control" id="">
</div>{{-- form-group --}}
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <label for="">Data Assinatura (Início):</label>
    <input type="date" name="subscription" class="form-control" id=""
           value="{{ $tenant->subscription ?? old('subscription') }}">
</div>{{-- form-group --}}
<div class="form-group">
    <label for="">Expira em (final):</label>
    <input type="date" name="expires_at" class="form-control" id=""
           value="{{ $tenant->expires_at ?? old('expires_at') }}">
</div>{{-- form-group --}}
<div class="form-group">
    <label for="">Identificador:</label>
    <input type="text" name="subscription_id" class="form-control" id=""
           value="{{ $tenant->subscription_id ?? old('subscription_id') }}" placeholder="Identificador">
</div>{{-- form-group --}}
<div class="form-group">
    <label for="subscription_active">Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control" id="">
        <option value="1" @if(isset($tenant) && $tenant->subscription_active == 1) selected @endif>SIM</option>
        <option value="0" @if(isset($tenant) && $tenant->subscription_active == 0) selected @endif>NÃO</option>
    </select>
</div>{{-- form-group --}}
<div class="form-group">
    <label for="subscription_suspended">Assinatura Cancelada?</label>
    <select name="subscription_suspended" class="form-control" id="">
        <option value="1" @if(isset($tenant) && $tenant->subscription_suspended == 1) selected @endif>SIM</option>
        <option value="0" @if(isset($tenant) && $tenant->subscription_suspended == 0) selected @endif>NÃO</option>
    </select>
</div>{{-- form-group --}}


<div class="form-group">
    <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Salvar</button>
    @if (!empty($tenant->id))
        <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
    @else
        <a href="{{ route('tenants.index') }}" class="btn btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</a>
    @endif
</div>{{-- form-group --}}
