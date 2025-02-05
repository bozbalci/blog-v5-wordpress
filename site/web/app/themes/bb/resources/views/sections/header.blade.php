<header class="site-header">
  <div class="wrapper flex items-center justify-between">
    <h1>
      <a href="/" class="site-title flex items-center no-underline">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24"
             class="icon site-logo">
          <path
            d="M486.91 478.08v9.21H356.86l-28.67-28.67-91.13-254.93h-17.92c-6.14 0-9.22 1.54-11.26 11.77l-38.4 176.1H50.18l-34.82-36.35 45.57-212.45c13.31-58.87 55.81-94.7 117.25-94.7h35.33c42.5 0 73.73 13.82 96.25 36.86l8.7 8.7V20.43h135.17l31.23 31.23v110.06H371.2c3.58 8.19 7.17 16.38 10.24 25.08l105.47 291.28Zm-56.32-41.47-98.3-270.8c-22.53-61.43-55.81-95.73-118.78-95.73h-35.33c-53.25 0-85.5 31.23-95.74 77.3l-41.98 193.5h82.94l34.3-158.69c3.58-16.89 13.31-28.67 32.77-28.67h22.02c23.55 0 35.33 16.38 45.06 43l86.02 240.09h87.04Zm-52.23-320.97V39.37H337.4v76.28h40.96Zm60.42 0V39.37h-40.45v76.28h40.45Z"/>
        </svg>
        <span>
          @if($isRunningHot)
            running hot!
          @else
            bozbalci
          @endif
        </span>
      </a>
    </h1>
    <nav>
      <ul class="header-links flex items-center">
        <li>
          <a href="/about" class="no-underline">About</a>
        </li>
        <li>
          <a href="/now" class="no-underline">Now</a>
        </li>
        <li class="hide-no-js">
          <button class="theme-switcher" aria-label="Toggle theme">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                 class="icon icon-moon">
              <path fill-rule="evenodd"
                    d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z"
                    clip-rule="evenodd"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                 class="icon icon-sun">
              <path
                d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z"/>
            </svg>
          </button>
        </li>
      </ul>
    </nav>
  </div>
</header>
