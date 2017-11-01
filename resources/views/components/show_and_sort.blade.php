<div class="col-md-10 col-sm-10">
    <div class="pull-right">
        <label class="control-label">Sortiraj&nbsp;po:</label>
        <select class="form-control input-sm" onchange="location=this.value" id="sort">
           @foreach($sort as $item)
                <option value="{{ url($item['url']) }}" >{{ $item['text'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<script>
    var options = document.querySelector("#sort").options;
    for(let i=0; i < options.length; i++) {
        if(options[i].value == window.location.href) {
            options[i].selected = true;
        }
    }
</script>