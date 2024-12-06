const tooltip = document.getElementById('tooltip');
const svg = document.getElementById('donut-chart');

const paths = svg.querySelectorAll('path');
paths.forEach(path => {
  path.addEventListener('mouseenter', function () {
    tooltip.textContent = `${path.getAttribute('data-title')}`;
    tooltip.style.display = 'block';
  });

  path.addEventListener('mousemove', function (event) {
    const rect = svg.getBoundingClientRect();
    tooltip.style.left = `${event.pageX - rect.left + 25}px`;
    tooltip.style.top = `${event.pageY - rect.top + 20}px`;
  });

  path.addEventListener('mouseleave', function () {
    tooltip.style.display = 'none';
  });
});