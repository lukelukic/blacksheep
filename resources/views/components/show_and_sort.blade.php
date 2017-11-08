
    <div class="pull-right">
        <label class="control-label">Sortiraj&nbsp;po:</label>
        <select class="form-control input-sm" onchange="location=this.value" id="sort">
            <option value="1">Nesto</option>
            <option value="2">Nesto drugo</option>
            <option value="3">Nesto trece</option>
        </select>
    </div>

<script>
    var options = document.querySelector("#sort").options;
    for(let i=0; i < options.length; i++) {
        if(options[i].value == window.location.href) {
            options[i].selected = true;
        }
    }
</script>
