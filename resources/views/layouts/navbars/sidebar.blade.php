<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a style="font-weight: 600;font-size: 15px;" href="#" class="simple-text logo-mini">{{ _('DN') }}</a>
            <a style="font-weight: 600;font-size: 15px;" href="#" class="simple-text logo-normal">{{ _('Dix News') }}</a>
        </div>
        <ul class="nav">
            @if (Auth::user()->authority === 'admin')
              <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('pages.users')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p style="font-weight: 600;font-size: 15px;color: #fff;">{{ _('Usuários') }}</p>
                </a>
              </li>
            @endif
            <li @if ($pageSlug == 'news') class="active " @endif>
                <a href="{{ route('pages.news.news') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p style="font-weight: 600;font-size: 15px;color: #fff;">{{ _('Notícias') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
