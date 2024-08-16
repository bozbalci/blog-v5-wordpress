const body = document.body;
const themeSwitcherBtn = document.querySelector('.theme-switcher');

function getUserThemePreference() {
  const storedPreference = localStorage.getItem('theme');
  if (storedPreference) {
    return storedPreference;
  }
  const prefersDarkColorScheme = window.matchMedia(
    '(prefers-color-scheme: dark)',
  ).matches;
  return prefersDarkColorScheme ? 'dark' : 'light';
}

function applyTheme(theme) {
  if (theme === 'dark') {
    body.classList.add('dark');
    body.classList.remove('light');
  } else {
    body.classList.add('light');
    body.classList.remove('dark');
  }
}

function toggleTheme() {
  const currentTheme = body.classList.contains('dark') ? 'dark' : 'light';
  const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
  applyTheme(newTheme);
  localStorage.setItem('theme', newTheme);
}

applyTheme(getUserThemePreference());
themeSwitcherBtn.addEventListener('click', toggleTheme);
