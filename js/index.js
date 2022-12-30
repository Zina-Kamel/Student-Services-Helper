const el = document.getElementById('buildings');

el.addEventListener('change', function handleChange(event) {
    const sage = document.getElementById('none');
  if (event.target.value == '000') {
    sage.style.display = 'none';
  } else {
    sage.style.display = 'none';
  }
});

el.addEventListener('change', function handleChange(event) {
    const sage = document.getElementById('SageHall');
  if (event.target.value == '101') {
    sage.style.display = 'block';
  } else {
    sage.style.display = 'none';
  }
});



el.addEventListener('change', function handleChange(event) {
    const wksc = document.getElementById('wksc');
  if (event.target.value == '102') {
    wksc.style.display = 'block';
  } else {
    wksc.style.display = 'none';
  }
});



el.addEventListener('change', function handleChange(event) {
    const nicol = document.getElementById('nicol');
  if (event.target.value == '103') {
    nicol.style.display = 'block';
  } else {
    nicol.style.display = 'none';
  }
});

el.addEventListener('change', function handleChange(event) {
    const safadi = document.getElementById('safadi');
  if (event.target.value == '104') {
    safadi.style.display = 'block';
  } else {
    safadi.style.display = 'none';
  }
});


el.addEventListener('change', function handleChange(event) {
    const aksob = document.getElementById('aksob');
  if (event.target.value == '110') {
    aksob.style.display = 'block';
  } else {
    aksob.style.display = 'none';
  }
});

el.addEventListener('change', function handleChange(event) {
    const gezairi = document.getElementById('gezairi');
  if (event.target.value == '113') {
    gezairi.style.display = 'block';
  } else {
    gezairi.style.display = 'none';
  }
});

el.addEventListener('change', function handleChange(event) {
    const atiyah = document.getElementById('atiyah');
  if (event.target.value == '155') {
    atiyah.style.display = 'block';
  } else {
    atiyah.style.display = 'none';
  }
});