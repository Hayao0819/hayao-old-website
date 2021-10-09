# smigle-hugo-theme

A minimalist theme for the static site generator [Hugo][hugo]. This
theme is shared on Hugo's [official collection of
themes][theme-collection].

### Features
- No JavaScript
- No Google spyware or tracking of any kind
- No other external dependencies or comment sections
- Only one local font ([Iosevka][font])

### Demo

https://smigle-hugo-theme.netlify.app/

### Screenshots

![smigle screenshot-1][screenshot-1]

### Installation

From the root of your site:
```bash
git submodule add https://gitlab.com/ian-s-mcb/smigle-hugo-theme.git themes/smigle
```

### Updating

From the root of your site:
```bash
git submodule foreach git pull origin main
```

### Run example site

```bash
hugo new site mysite -f yaml
cd mysite
git init
git submodule add https://gitlab.com/ian-s-mcb/smigle-hugo-theme themes/smigle
cd themes/smigle/exampleSite
hugo server
```

### Contributing
Have you found a bug or got an idea for a new feature? Feel free to use
the [issue tracker][issue-tracker] to let me know. Or make directly a
[merge request][merge-request].

### Acknowledgements

This theme was created from scratch and influenced by the following two
Hugo themes:

- [colorchestra's smol][smol-colorchestra]
- [Sumner Evans's smol][smol-sumner]

[hugo]: https://gohugo.io/
[theme-collection]: https://themes.gohugo.io/themes/smigle-hugo-theme/
[screenshot-1]: https://gitlab.com/ian-s-mcb/smigle-hugo-theme/-/raw/main/images/screenshot.png
[font]: https://github.com/be5invis/iosevka
[issue-tracker]: https://gitlab.com/ian-s-mcb/smigle-hugo-theme/-/issues
[merge-request]: https://gitlab.com/ian-s-mcb/smigle-hugo-theme/-/merge_requests
[smol-sumner]: https://github.com/sumnerevans/smol
[smol-colorchestra]: https://github.com/colorchestra/smol
