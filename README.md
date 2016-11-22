This is a heavily reworked version of Starkers theme available [here](https://github.com/viewportindustries/starkers) (starting from v4.0).

It borrows from [BEM](http://www.bem.info)/[7-1 pattern](https://sass-guidelin.es/#architecture)/[ITCSS](https://speakerdeck.com/dafed/managing-css-projects-with-itcss)/[Harry Roberts' namespaces](http://csswizardry.com/2015/03/more-transparent-ui-code-with-namespaces/#the-namespaces) idea.

BEM naming style: `component__element_modifier`.

##Namespaces cheatsheet

- `o-`: object - reusable, doesn't depend on specific styling (for example, grids, inline lists etc). Should never be overriden
- `c-`: component=block (with `__elements` and `_modifiers`). Components may be nested and itself have a modifier
- `u-`: utility - serves only one function (for example, `u-fontsize-large`)
- `t-`: themed class (for example, dark/light background class, `t-light`, or mixins/extends that are related only to appearance and cannot be used alone)
- `s-`: new styling context or scope inside which tag selectors will be used (for example, `.s-textcontent` with `.s-textcontent p` inside)
- `is-`, `has-`, `no-`: indicate UI element's state or condition (`is-open`, `has-dropdown` etc)
- `_`: hacks - should be combined with other prefixes (`_c-footer`)
- `js-`: Javascript related styling (won't apply if Javascript is turned off)
- `p-`: specific page related styling (body classes, for example, `p-page`. Requires a function in `functions.php`)

##TODO

3. remove `external/starkers-utilities.php`
4. move more folders into `src` directory (files that shouldn't be on prod server)
5. remove `search.php`
7. think about how to introduce a convenient @print vs @screen workflow (so that we could easily separate all screen-related things already during work)