<div class="sidebar col-md-3 col-sm-4">
  <?php
  $data2 = [
    'categories' => [
        [ 'name' => "Kategorija1", "id" => 1 ],
        [ 'name' => "Kategorija2", "id" => 2 ],
    ]
  ];
    $data3 = [
            'categories' => [
                    [ 'name' => "Kategorija1", "id" => 1 ],
                    [ 'name' => "Kategorija2", "id" => 2 ],
            ]
    ];
    $data4 = [
            'categories' => [
                    [ 'name' => "Kategorija1", "id" => 1 ],
                    [ 'name' => "Kategorija2", "id" => 2 ],
            ]
    ];
   ?>
   @component('components.categories',$data2)@endcomponent
      Brend
  @component('components.checkbox_sidebar',$data3)@endcomponent
      Tip
  @component('components.checkbox_sidebar',$data4)@endcomponent

</div>
