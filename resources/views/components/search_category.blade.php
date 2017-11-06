<form action="{{ url("/products") }}" method="get">
    <div class="input-group reducediv pull-right">
        <input type="text" placeholder="Pretraži" name="keyword" class="form-control reducecontrol"/>
            <span class="input-group-btn">
                      <button class="btn btn-primary reducebtn" type="submit"><i class='fa fa-search'></i></button>
            </span>
    </div>
</form>
