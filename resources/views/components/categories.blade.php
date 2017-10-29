<li class="list-group-item clearfix dropdown">
    <?php
//    function cat($data) {
//        foreach($data as $key=>$value)
//        {
//            if(is_array($value)) {
//                echo "<p style='color:red'>".$key."</p>";
//                cat($value);
//                continue;
//            }
//            echo $value;
//            echo '<br>';
//        }
//    }
    function color($level){

        switch($level){
            case 0: return "#FF3838"; break;//red
            case 1: return "#FF9F38"; break;//orange
            case 2: return "#FFEA38"; break;//yellow
            case 3: return "#80FF38"; break;//green
            case 4: return "#38AEFF"; break;//blue
            case 5: return "#8638FF"; break;//purple
            default: return "#9C9C9C"; break;//gray
        }
    }
    $GLOBALS['i'] = 0;
    function cat($data, $level = 0) {
        foreach($data as $key=>$value)
        {


            if(is_array($value)) {
    $GLOBALS['len'] = count($value);
            ?>
        @switch ($level)
            @case('0')
            <a href="">
                <i class="fa fa-angle-right"></i>
                {{$key}}
            </a>
            <ul class="dropdown-menu">
                <li class="list-group-item dropdown clearfix">
            @break
            @case('1')
                    <a href=""><i class="fa fa-angle-right"></i> {{$key.$level}} </a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item dropdown clearfix">
            @break
                            @case('2')
                            <a href=""><i class="fa fa-angle-right"></i> {{$key.$level}} </a>
                            <ul class="dropdown-menu">
                            @break
        @endswitch
              <?php
                cat($value, ++$level);
                $level--;
                continue;
            }

            echo  "<li><a href=''>".$value."</a></li>";
            if(($GLOBALS['i'] == $GLOBALS['len'] - 1))
                {
                    echo "</ul></li>";
                    echo "<li class='list-group-item dropdown clearfix'>";
                    $GLOBALS['i'] = -1;

                }

        $GLOBALS['i']++;
        }
    }
        ?>


<?php


cat($artikli);
?>



