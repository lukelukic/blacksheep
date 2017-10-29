@foreach($details as $detail)
<div id="payment-address-content" class="panel-collapse collapse">
    <div class="panel-body row">
        <div class="col-md-6 col-sm-6">
            <h3>Lični podaci</h3>
            <div class="form-group">
                <label for="firstname">Ime <span class="require">*</span></label>
                <input type="text" id="firstname" class="form-control" value="{{$detail['name']}}">
            </div>
            <div class="form-group">
                <label for="lastname">Prezime <span class="require">*</span></label>
                <input type="text" id="lastname" class="form-control" value="{{$detail['surname']}}">
            </div>
            <div class="form-group">
                <label for="email">E-Mail <span class="require">*</span></label>
                <input type="text" id="email" class="form-control" value="{{$detail['email']}}">
            </div>
            <div class="form-group">
                <label for="telephone">Telefon <span class="require">*</span></label>
                <input type="text" id="telephone" class="form-control" value="{{$detail['tel']}}">
            </div>



        </div>
        <div class="col-md-6 col-sm-6">
            <h3>Adresa</h3>
            <div class="form-group">
                <label for="adresa1">Adresa</label>
                <input type="text" id="company" class="form-control" value="{{$detail['address']}}">
            </div>
            <div class="form-group">
                <label for="adresa2">Adresa 2</label>
                <input type="text" id="address1" class="form-control" value="{{$detail['address2']}}">
            </div>
            <div class="form-group">
                <label for="grad">Grad</label>
                <select class="form-control input-sm" id="region-state">
                    <script>
                        var e = document.getElementById("region-state");
                        for(var i=0;i<=e.length;i++){
                            if(e.options[e.selectedIndex].value === "3513"){
                                e.options.setAttribute("selected","selected");
                            }
                        }
                    </script>
                    <option value=""> --- Izaberite --- </option>
                    <option value="3513">Obrenovac</option>
                    <option value="3514">Resnik</option>
                    <option value="3515">Svilajnac</option>
                </select>
            </div>
            <div class="form-group">
                <label for="postanskibroj">Poštanski broj <span class="require">*</span></label>
                <input type="text" id="city" class="form-control" value="{{$detail['zip']}}">
            </div>


            <button class="btn btn-primary  pull-right" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content" id="button-payment-address">Nastavite</button>
        </div>
    </div>
</div>
    @endforeach