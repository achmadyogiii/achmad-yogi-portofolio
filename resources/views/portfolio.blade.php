<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('portfolio.meta_title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="site-shell">
        <header class="topbar">
            <a class="mark" href="/">ay<span>.</span></a>
            <nav class="nav" aria-label="{{ __('portfolio.navigation_label') }}"><a href="#work">{{ __('portfolio.nav.work') }}</a><a href="#about">{{ __('portfolio.nav.about') }}</a><a href="#skills">{{ __('portfolio.nav.skills') }}</a><a href="#contact">{{ __('portfolio.nav.contact') }}</a></nav>
            <div class="topbar-actions">
                <div class="language-switch" role="group" aria-label="{{ __('portfolio.language_label') }}">
                    @foreach (['en' => 'EN', 'id' => 'ID'] as $locale => $label)
                        <form action="{{ route('language.switch', $locale) }}" method="POST">
                            @csrf
                            <button type="submit" lang="{{ $locale }}" @class(['is-active' => app()->getLocale() === $locale]) @if (app()->getLocale() === $locale) aria-current="true" @endif>{{ $label }}</button>
                        </form>
                    @endforeach
                </div>
                <div class="status"><i></i> {{ __('portfolio.status') }}</div>
            </div>
        </header>
        <main>
            <section class="hero">
                <div>
                    <div class="eyebrow mono">{{ __('portfolio.location') }}</div>
                    <h1>{!! __('portfolio.hero_title') !!}</h1>
                    <p class="hero-copy">{{ __('portfolio.hero_description') }}</p>
                    <div class="hero-skills" aria-label="{{ __('portfolio.core_skills') }}">
                        @foreach (__('portfolio.hero_skills') as $skill)
                            <span>{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="hero-aside">
                    <div class="portrait"><img src="{{ asset('images/profile.png') }}" alt="{{ __('portfolio.portrait_alt') }}" onerror="this.style.display='none'"><span class="portrait-label mono">{{ __('portfolio.portrait_label') }}</span></div><span class="mono section-count">{{ __('portfolio.scroll_hint') }}</span>
                </div>
            </section>
            <section class="section" id="work">
                <div class="section-head">
                    <h2>{{ __('portfolio.projects_heading') }}</h2><span class="mono section-count">{{ __('portfolio.projects_count') }}</span>
                </div>
                <div class="work-grid">
                    @foreach (__('portfolio.projects') as $index => $project)
                        <article class="project">
                            <div class="project-number mono">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }} / {{ $project['category'] }}</div>
                            <h3 class="project-title">
                                @if (isset($project['url']))
                                    <a class="publication-link" href="{{ $project['url'] }}" target="_blank" rel="noreferrer">{{ $project['title'] }} ↗</a>
                                @else
                                    {{ $project['title'] }}
                                @endif
                            </h3>
                            <p class="project-meta"><strong>{{ __('portfolio.tech_stack') }}:</strong> {{ $project['stack'] }}</p>
                            <h4 class="project-highlights-title">{{ __('portfolio.project_highlights') }}</h4>
                            <ul class="project-highlights">
                                @foreach ($project['achievements'] as $achievement)
                                    <li>{!! $achievement !!}</li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
                <div class="publication-section">
                    <div class="section-head publication-heading">
                        <h2>{{ __('portfolio.publications_heading') }}</h2><span class="mono section-count">{{ __('portfolio.publications_count') }}</span>
                    </div>
                    <div class="publication-grid">
                        @foreach (__('portfolio.publications') as $index => $publication)
                            <article class="project publication-card">
                                <div class="project-number mono">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }} / {{ __('portfolio.publication_category') }}</div>
                                <h3 class="project-title"><a class="publication-link" href="{{ $publication['url'] }}" target="_blank" rel="noreferrer">{{ $publication['title'] }} ↗</a></h3>
                                <p class="project-meta"><strong>{{ __('portfolio.publisher') }}:</strong> {{ $publication['publisher'] }}</p>
                                <p class="project-meta"><strong>{{ __('portfolio.tech_stack') }}:</strong> {{ $publication['stack'] }}</p>
                                <h4 class="project-highlights-title">{{ __('portfolio.publication_highlights') }}</h4>
                                <ul class="project-highlights">
                                    @foreach ($publication['highlights'] as $highlight)
                                        <li>{!! $highlight !!}</li>
                                    @endforeach
                                </ul>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="section about" id="about">
                <div><span class="eyebrow mono">{{ __('portfolio.about_label') }}</span></div>
                <div>
                    <p class="about-copy">{{ __('portfolio.about_intro') }}</p>
                    <p class="about-detail">{{ __('portfolio.about_description') }}</p>
                    <div class="education">
                        <span class="mono education-heading">{{ __('portfolio.education') }}</span>
                        <strong>Universitas Bina Sarana Informatika</strong>
                        <em>{{ __('portfolio.education_degree') }}</em>
                        <small>{{ __('portfolio.education_period') }}</small>
                        <ul class="education-achievements">
                            @foreach (__('portfolio.education_achievements') as $achievement)
                                <li><strong>{{ $achievement['title'] }}</strong> — {{ $achievement['detail'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
            <section class="section skills-section" id="skills">
                <div><span class="eyebrow mono">{{ __('portfolio.toolkit_label') }}</span>
                    <h2>{!! __('portfolio.skills_heading') !!}</h2>
                </div>
                <div class="skill-list">
                    @foreach (__('portfolio.skills') as $index => $skill)
                        <div><span class="mono">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                            <p>{{ $skill['title'] }}</p><small>{{ $skill['description'] }}</small>
                        </div>
                    @endforeach
                </div>
            </section>
            <section class="section contact" id="contact">
                <div><span class="eyebrow mono">{{ __('portfolio.contact_eyebrow') }}</span>
                    <h2>{!! __('portfolio.contact_heading') !!}</h2>
                    <a class="contact-link mono" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=achmadyogipamungkas%40gmail.com" target="_blank" rel="noopener noreferrer">achmadyogipamungkas@gmail.com ↗</a>
                </div>
            </section>
        </main>
        <footer>
            <span class="mono">© 2026 Achmad Yogi Pamungkas</span>
            <nav class="social-links" aria-label="{{ __('portfolio.social_links') }}">
                <a href="https://github.com/achmadyogiii" target="_blank" rel="noopener noreferrer" aria-label="GitHub" title="GitHub">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 .9a11.1 11.1 0 0 0-3.51 21.63c.56.1.76-.24.76-.54v-2.08c-3.1.67-3.76-1.31-3.76-1.31-.5-1.29-1.24-1.63-1.24-1.63-1.02-.7.08-.69.08-.69 1.13.08 1.73 1.16 1.73 1.16 1 .1.76 2.07 3.3 1.45.1-.73.4-1.23.7-1.51-2.47-.28-5.06-1.24-5.06-5.5 0-1.22.44-2.22 1.16-3-.12-.28-.5-1.42.11-2.96 0 0 .95-.3 3.05 1.15a10.6 10.6 0 0 1 5.56 0c2.1-1.45 3.05-1.15 3.05-1.15.61 1.54.23 2.68.11 2.96.72.78 1.16 1.78 1.16 3 0 4.27-2.6 5.21-5.08 5.49.4.35.76 1.02.76 2.06v3.06c0 .3.2.65.77.54A11.1 11.1 0 0 0 12 .9Z"/></svg>
                </a>
                <a href="https://www.linkedin.com/in/achmad-yogi-pamungkas-504b73317/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" title="LinkedIn">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.45 2H3.55C2.69 2 2 2.68 2 3.52v16.96c0 .84.69 1.52 1.55 1.52h16.9c.86 0 1.55-.68 1.55-1.52V3.52c0-.84-.69-1.52-1.55-1.52ZM7.93 18.9H4.98V9.4h2.95v9.5ZM6.46 8.1a1.71 1.71 0 1 1 0-3.42 1.71 1.71 0 0 1 0 3.42Zm12.45 10.8h-2.94v-4.62c0-1.1-.02-2.51-1.53-2.51-1.53 0-1.76 1.2-1.76 2.43v4.7H9.74V9.4h2.82v1.3h.04c.4-.75 1.35-1.53 2.78-1.53 2.97 0 3.53 1.95 3.53 4.49v5.24Z"/></svg>
                </a>
                <a href="https://wa.me/6288296547791" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" title="WhatsApp">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.84 11.84 0 0 0 12.1 0C5.53 0 .18 5.34.18 11.92c0 2.1.55 4.15 1.6 5.96L.08 24l6.27-1.64a11.9 11.9 0 0 0 5.75 1.47h.01c6.57 0 11.92-5.35 11.92-11.92 0-3.18-1.24-6.17-3.51-8.43Zm-8.42 18.34h-.01c-1.8 0-3.57-.49-5.1-1.4l-.37-.22-3.72.98.99-3.63-.24-.38a9.87 9.87 0 0 1-1.52-5.25c0-5.49 4.47-9.96 9.97-9.96a9.9 9.9 0 0 1 7.05 2.92 9.9 9.9 0 0 1 2.91 7.05c0 5.5-4.47 9.97-9.96 9.97Zm5.47-7.47c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.47-.9-.8-1.5-1.78-1.68-2.08-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.79.38-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.09 4.49.71.3 1.27.49 1.7.63.71.22 1.36.19 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.08-.12-.27-.2-.57-.35Z"/></svg>
                </a>
            </nav>
        </footer>
    </div>
</body>

</html>