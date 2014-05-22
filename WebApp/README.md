Marketing Design System (MDS) README
===========

This implementation of the Marketing Design System (MDS) consists of:

- [**Twitter Bootstrap**](http://twitter.github.com/bootstrap/) for the overall page layout, scaffolding, and basic components
- [**GE Bootstrap**](https://devcloud.sw.ge.com/source/projects/DXC/repos/ge-bootstrap), an extension of Twitter Bootstrap supporting GE's brand
- [**Modernizr**](http://modernizr.com/) to detect HTML5 and CSS3 features in the user's browser
- [**jQuery**](http://jquery.com/) for DOM manipulation and general front-end utility use
- [**RequireJS+jQuery**](https://github.com/jrburke/require-jquery) for Javascript code modularity.

Release Distribution
--------------------
The MDS release distribution includes the following:

- `docs` contains all assets used by the MDS documentation pages
- `less` contains the MDS stylesheets, in LESS format
- `js` contains the master MDS application JavaScript and the configuration file used by RequireJquery

=======
## Structure

- **README.md** — A starter readme file in Markdown format.
- **History.md** — A starter history/changelog file, also in Markdown format.
- **package.json** — An [npm](https://npmjs.org/) package file for specifying information and dependencies.
- **bower.json** — A [Bower](http://bower.io/) package file for specifying information and dependencies.
- **.bowerrc** — A configuration file for Bower which tells it to look for modules on our Stash server.
- **.jshintrc** — [JSHint](http://www.jshint.com/) configuration file for managing JavaScript code quality.
- **.editorconfig** — [EditorConfig](http://editorconfig.org/) configuration file for managing coding styles within IDEs.
- **docs/**- This folder contains documentation and examples of MDS layouts, elements, and components.
- **js/** — This folder contains a [RequireJS](http://requirejs.org/) config file.
- **less/** — This folder contains [LESS](http://lesscss.org/) stylesheets for basic and responsive styles. It also includes some variables.


To log a bug or request a feature please see the [MDS JIRA page](https://devcloud.swcoe.ge.com/tracker/browse/MDS).

© General Electric

