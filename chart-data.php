<?php
  /* ------ MOCK DATA ------ */
  $chartContent = [
    "attributes" => [
      "highlightMeasurement" => "€ X.000.000",
      "baseColor" => "#B3C0CE"
    ],
    "data" => [
      [
        "value" => 4,
        "label" => "4%",
        "title" => "tooltip",
        "reference" => 1,
      ],
      [
        "value" => 7,
        "label" => "7%",
        "title" => "tooltip",
        "reference" => 2,
      ],
      [
        "value" => 12,
        "label" => "12%",
        "title" => "tooltip",
        "reference" => 3,
      ],
      [
        "value" => 42,
        "label" => "42%",
        "title" => "tooltip",
        "reference" => 4,
      ],
      [
        "value" => 12,
        "label" => "12%",
        "title" => "tooltip",
        "reference" => 5,
      ],
      [
        "value" => 23,
        "label" => "23%",
        "title" => "tooltip",
        "reference" => 6,
      ]
    ]
  ];

  /* ------ CHART SETTINGS ------ */
  $total = 100;
  $chartWidth = 350;

  /* ------ COLORS ------ */
  $baseColor = $chartContent['attributes']['baseColor'];

  /* ------ SVG PATHS ------ */
  $svgPaths = [];
  $startAngle = -90;
  foreach ($chartContent['data'] as $index => $data) {
    $angle = 360 * $data['value'] / $total;
    $endAngle = $startAngle + $angle;

    $start = [
      'x' => ($chartWidth/2) + ($chartWidth/2) * cos(deg2rad($startAngle)),
      'y' => ($chartWidth/2) + ($chartWidth/2) * sin(deg2rad($startAngle))
    ];

    $end = [
      'x' => ($chartWidth/2) + ($chartWidth/2) * cos(deg2rad($endAngle)),
      'y' => ($chartWidth/2) + ($chartWidth/2) * sin(deg2rad($endAngle))
    ];

    $largeArcFlag = $angle > 180 ? 1 : 0;

    $path = "M" . ($chartWidth/2) . "," . ($chartWidth/2) . " L{$start['x']},{$start['y']} A" . ($chartWidth/2) . "," . ($chartWidth/2) . " 0 {$largeArcFlag},1 {$end['x']},{$end['y']} Z";

    /* ------ LABELS ------ */
    $labelAngle = $startAngle + ($angle / 2);
    $labelRadius = ($chartWidth / 2.6);
    $outLabelRadius = ($chartWidth / 1.8);

    $labelX = ($chartWidth / 2) + $labelRadius * cos(deg2rad($labelAngle));
    $labelY = ($chartWidth / 2) + $labelRadius * sin(deg2rad($labelAngle));
    $outLabelX = ($chartWidth / 2) + $outLabelRadius * cos(deg2rad($labelAngle));
    $outLabelY = ($chartWidth / 2) + $outLabelRadius * sin(deg2rad($labelAngle));

    /* ------ FINAL DATA ------ */
    $svgPaths[] = [
      'path' => $path,
      'title' => $data['title'],
      'label' => $data['label'],
      'color' => "oklch(from " . $baseColor . " calc(90% - " . ($index * 10) . "%) c h)",
      'reference' => $data['reference'],
      'labelX' => $labelX,
      'labelY' => $labelY,
      'outLabelX' => $outLabelX,
      'outLabelY' => $outLabelY,
    ];

    $startAngle = $endAngle;
  }

  $highlightMeasurement = $chartContent['attributes']['highlightMeasurement'];
?>