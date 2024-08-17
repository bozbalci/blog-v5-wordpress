document.addEventListener('DOMContentLoaded', () => {
  const body = document.body;
  const themeSwitcherBtn = document.querySelector('.theme-switcher');

  const getUserThemePreference = () =>
    localStorage.getItem('theme') ||
    (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

  const applyTheme = (theme) => {
    body.classList.toggle('dark', theme === 'dark');
    body.classList.toggle('light', theme === 'light');
    localStorage.setItem('theme', theme);
  };

  const toggleTheme = () => {
    const newTheme = body.classList.contains('dark') ? 'light' : 'dark';
    applyTheme(newTheme);
  };

  applyTheme(getUserThemePreference());
  themeSwitcherBtn.addEventListener('click', toggleTheme);
});
