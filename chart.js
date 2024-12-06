const tooltip = document.getElementById('tooltip');
const svg = document.getElementById('donut-chart');

const paths = svg.querySelectorAll('path');
paths.forEach((path, index) => {
  path.addEventListener('mouseenter', function (event) {
    const rect = svg.getBoundingClientRect();
    tooltip.textContent = `${path.getAttribute('data-title')}`;
    tooltip.style.left = `${event.pageX - rect.left + 10}px`;
    tooltip.style.top = `${event.pageY - rect.top + 10}px`;
    tooltip.style.display = 'block';
  });

  path.addEventListener('mouseleave', function () {
    tooltip.style.display = 'none';
  });
});