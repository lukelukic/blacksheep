<div class="sidebar col-md-3 col-sm-4">
  <?php
  $data2 = [
    'details' =>
      [
        [
          'name' => 'Maske'
        ],
        [
          'name' => 'Punjaci'
        ]
      ]
  ]
   ?>
   @component('components.categories',$data2)@endcomponent
  Tip
  <?php
  $data3 = [
    'details' => [
      [
        'id' => 1,
        'name' => 'Juliette'
      ],
      [
        'id' => 2,
        'name' => 'Pierre Cardin'
      ]
    ]
  ];
  $data4 = [
    'details' => [
      [
        'id' => 1,
        'name' => 'LG'
      ],
      [
        'id' => 2,
        'name' => 'Samsung'
      ]
    ]
  ]
  ?>
  Tip

  @component('components.checkbox_sidebar',$data3)@endcomponent

Brend

  @component('components.checkbox_sidebar',$data4)@endcomponent

<!-- <input type="submit" value="Submit"> -->
</div>
