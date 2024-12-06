
<div class="chart-container">
    <svg 
      id="donut-chart" 
      width="<?php echo $chartWidth; ?>" 
      height="<?php echo $chartWidth; ?>"
      viewBox="<?php echo "0 0 $chartWidth $chartWidth"; ?>"
      xmlns="http://www.w3.org/2000/svg"
    >
      <?php foreach ($svgPaths as $index => $path): ?>
        <!-- Slice -->
        <path 
          class="slice"
          d="<?php echo $path['path']; ?>" 
          data-title="<?php echo $path['title']; ?>" 
          fill="<?php echo $path['color']; ?>"
        />
        <!-- Inner label -->
        <text 
          class="inner-label"
          x="<?php echo $path['labelX']; ?>" 
          y="<?php echo $path['labelY']; ?>" 
          alignment-baseline="middle" 
        >
          <?php echo $path['label']; ?>
        </text>
        <!-- Outer label -->
        <rect 
          class="outer-label-wrapper"
          x="<?php echo $path['outLabelX'] - 13; ?>" 
          y="<?php echo $path['outLabelY'] - 11.5; ?>" 
          width="26" 
          height="20" 
          rx="3"
          ry="3"
        />
        <text 
          class="outer-label"
          x="<?php echo $path['outLabelX']; ?>" 
          y="<?php echo $path['outLabelY']; ?>"
          alignment-baseline="middle" 
          text-anchor="middle"
        >
          <?php echo $path['reference']; ?>
        </text>
      <?php endforeach; ?>
      <!-- Highlight measurement -->
      <circle 
        cx="<?php echo ($chartWidth/2); ?>"  
        cy="<?php echo ($chartWidth/2); ?>" 
        r="<?php echo ($chartWidth/3.5); ?>" 
        fill="#FFFFFF" 
      />
      <text 
        class="highlight"
        x="<?php echo ($chartWidth/2); ?>" 
        y="<?php echo ($chartWidth/2); ?>" 
        alignment-baseline="middle" 
      >
        <?php echo $highlightMeasurement; ?>
      </text>
    </svg>

    <!-- Tooltip -->
    <div id="tooltip" class="tooltip"></div>
  </div>
