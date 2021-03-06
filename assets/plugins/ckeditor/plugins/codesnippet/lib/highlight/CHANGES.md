## Version 8.0 beta

This new major release is quite a big overhaul bringing both new features and
some backwards incompatible changes. However, chances are that the majority of
users won't be affected by the latter: the basic scenario described in the
README is left intact.

Here's what did change in an incompatible way:

- We're now prefixing all classes located in [CSS classes reference][cr] with
  `hljs-`, by default, because some class names would collide with other
  people's stylesheets. If you were using an older version, you might still want
  the previous behavior, but still want to upgrade. To suppress this new
  behavior, you would initialize like so:

  ```html
  <script type="text/javascript">
    hljs.configure({classPrefix: ''});
    hljs.initHighlightingOnLoad();
  </script>
  ```

- `tabReplace` and `useBR` that were used in different places are also unified
  into the global options object and are to be set using `configure(options)`.
  This function is documented in our [API docs][]. Also note that these
  parameters are gone from `highlightBlock` and `fixMarkup` which are now also
  rely on `configure`.

- We removed public-facing (though undocumented) object `hljs.LANGUAGES` which
  was used to register languages with the library in favor of two new methods:
  `registerLanguage` and `getLanguage`. Both are documented in our [API docs][].

- Result returned from `highlight` and `highlightAuto` no longer contains two
  separate attributes contributing to relevance score, `relevance` and
  `keyword_count`. They are now unified in `relevance`.

Another technically compatible change that nonetheless might need attention:

- The structure of the NPM package was refactored, so if you had installed it
  locally, you'll have to update your paths. The usual `require('highlight.js')`
  works as before. This is contributed by [Dmitry Smolin][].

New features:

- Languages now can be recognized by multiple names like "js" for JavaScript or
  "html" for, well, HTML (which earlier insisted on calling it "xml"). These
  aliases can be specified in the class attribute of the code container in your
  HTML as well as in various API calls. For now there are only a few very common
  aliases but we'll expand it in the future. All of them are listed in the
  [class reference][].

- Language detection can now be restricted to a subset of languages relevant in
  a given context — a web page or even a single highlighting call. This is
  especially useful for node.js build that includes all the known languages.
  Another example is a StackOverflow-style site where users specify languages
  as tags rather than in the markdown-formatted code snippets. This is
  documented in the [API reference][] (see methods `highlightAuto` and
  `configure`).

- Language definition syntax streamlined with [variants][] and
  [beginKeywords][].

New languages and styles:

- *Oxygene* by [Carlo Kok][]
- *Mathematica* by [Daniel Kvasnička][]
- *Autohotkey* by [Seongwon Lee][]
- *Atelier* family of styles in 10 variants by [Bram de Haan][]
- *Paraíso* styles by [Jan T. Sott][]

Miscelleanous improvements:

- Highlighting `=>` prompts in Clojure.
- [Jeremy Hull][] fixed a lot of styles for consistency.
- Finally, highlighting PHP and HTML [mixed in peculiar ways][php-html].
- Objective C and C# now properly highlight titles in method definition.
- Big overhaul of relevance counting for a number of languages. Please do report
  bugs about mis-detection of non-trivial code snippets!

[cr]: http://highlightjs.readthedocs.org/en/latest/css-classes-reference.html
[api docs]: http://highlightjs.readthedocs.org/en/latest/api.html
[variants]: https://groups.google.com/d/topic/highlightjs/VoGC9-1p5vk/discussion
[beginKeywords]: https://github.com/isagalaev/highlight.js/commit/6c7fdea002eb3949577a85b3f7930137c7c3038d
[php-html]: https://twitter.com/highlightjs/status/408890903017689088

[Carlo Kok]: https://github.com/carlokok
[Bram de Haan]: https://github.com/atelierbram
[Daniel Kvasnička]: https://github.com/dkvasnicka
[Dmitry Smolin]: https://githubD�YQ_��1�X���V�2�I��k����y�g��ٌ$���3�xqh�9�d*���ڴ�s%.22H/�������7��*1�t� ��67��Bm�$NŁ�����l$3�
!ᕙr��B3�x�Q�9J�X/���,uT���S9Kt�=����ѷ���://�>p^7�#����m���N7v�v�~̌�)шZ+-4e)|Y�,`��
d�����[#B�i�{��J�8B.��o_*/��-ػ�e��R;��2?�=if�������.�lrq��$P� 3U�#�����Ƨs����Da氚@cY��	H�\��%Lwn��(c%�*�W;�/�t�^<7�e�&@��C�3�2bQڵ�@�*M���̹�&#��z���^Ta+�G%����I{�+,_L�.�.�����r���y��]֓ݑ�=4�1�y��8��&������n��M�=��q�����H�}����C�0���� ��	�a�%:��~1'̧���΂�D6��4�RXבg?ӭ0ȯ�|�	
A�Ұ�ė�d�]%�%�`�ncx-���.Z��f�T�����N��6= f0/���j�L-�t -|�K�d�66��'�
���ab��C��n�Ŋ(h�=�>85��<��9�ɹደ����������ګ���i�� O]f�Z4oΗn>���^����������� 8�t4N�y��4��%�"ͥwQ~ �&)#�P�c���w�@Ƈވ�ܙ�K���9��P*�'?;�'H�����7���m
�Yv�_��Y����u�N����?Ø�߀Ъ!��7!�m����{ӧ�Hݻ��4��1n�A�����+9�d̓��#�s��|1[�Nj�����{����H���f���<�n�DtC�E��`"�J��pJ��/x�Y������"��dh&��JC&Ė���=]��cl���;T�;?s�m�P�a��wp���Rݤ�2�䔛؄�'��T���5��3�?F��!'�|���ΖE�K	�� 6��@B����3`�,�9�MM�ۈ�q
�Qｾ�
{�HX���T����B���~C@b2���P̭F'�@!��홿b�Fz��(��Dϴ~�k [�g���ȏT	�@i�k�K��a\,U���F��!,�Dk0���j�8+�f�u<~!9(>���m��+��_��-*L���M��א`v�^"�+���u�SpK��n�`�mo��[<^�/.�E�/��/�6�{�
-�T����X��c;ʫU�
hZ��\�lL�N=�v����)��=��dES����"5���AJ��l��X��_�T�XG����bO�4&�qWm�3j`��ֳp�tW�!z�X���m���j<	�H�ut�}�0�a�H�\�vL��c1-+'��[U�+d4�D�"4�ޣ�R�b�%�j@x������,"}�8��Rvװ�i�~�t�^�F�����0�@���C���%�*$nh����w�n4QJc���|X�Wp�D��
Q��X�_
���v��Ѣ�-?�� ߋ\Q6kbz�;Ԃ��=�����5މ���iS�\�E�b�i1�q Dѝ�Q�1�Ԝ��[���8�<��|.>�-��\��^)�o<`<��oA��A������;��(\�l��=h�s/ɲmp�L�gz��G��e�lS����_�7����Է�	>q5L�o����(w���F���}����f�\���o��)u=D�0l�R��_WLp=}���*O�\Nt��=ґbʀto���bdҺCD����`�����H�qbe��&���zu�o��bo^AT��G�ki�J?.-]Ⱥ\���:���)A^`��3<"�������UI���,��sy���d����8�6(��*;,���w��:F�uj=b�-m&�P�<�Æ�^���n�����m9��+OuΈ,�D�8c����$��;ou`��o�:L����4�֬2Y3~���u
���=�<�J>EV8I����/���p�����`��$�յ
��s�<�3��lF�OәS�84��Y2��imZ������Z]�]�t]��c��e	�i��J��cs�6	C��@�I�me6��	������L�ot��w�˨���A���lx�:�\�ѩ�%:���ŀ���Z�V���E8��]�UӆF�s�6�zA�;{�a?fF��hD�������N��a2WY�G�������˽Mf%��Q!�z�/�����]��S�S��NA��Ϟ43k�hp��W�[6�8]l(v���Ǒ��Zv�ӹ��J}�0sXM�����$O�����;���?���q���P�B/��
�2} G�!�b�(��X�W����_�\D��=�_c/��ԣ����=��/&KT���xZI\9��L�<t��.��������NWxI�ej�z7Hr�&����yl���|$���o~�!�[���GlP҄ǰ qْ`_?�����SZg�e"��k�j)��ȅ�����V��|�����	iXR�K^�Ȯ���@�h�1��f�rQ�lm3@*Y�ZHg'\q�3����s����yM:�>�%g2���v���01�P�![	V��bE�T�� P��s�ن�����E���l�����r�d�U��봍ZB��.3tI-�7�K7[�d����{Cq��y���� �l:'��<�fe�k��һ(?����?g�ȱ���;� �Co�p�L�%F���`(ʊ����_�}���v�۶��,��/R����A�:S'b�o��a��o@h��ʿ����F޽��k���Id���7� Lz��ڕ}2�I����M��-b'5�U
P��=BGXs$EIz�PI�g��K"�!e��RR0y%�h8�|݅<�,�e]�|R�w24�~�!b��z��1�q�}��*����q]�6A(��0Xy��;8\tw�n�hcr�Ml�
��v��_ǚJ�ٙ����Z󐓀_>��vg˂�饄�W��}Z ��r���C����&�mD�8�Ѩ�^_}�=v$,���J*�W��|����ΉG�! 1HSD(�V�c��j���_�u#=��~�]L�gZ?�5��ɳ��
N�G��v�4ߵإ��0.��|fr�����F�� tFk5S��A��:�?���u��Ķzj��^�/��&T@��P�kH0;�/ʕ�e�:�)�%�`7W0xԶ�r[�-/�����_�?�=�_�W�In}Q�Zر�ժH4-B�@�A6�z��H;������ОB���"�)j�����R� %�I���I,�L��/M�V,���srU��y縫6�50ֆx�Y8�U�+���g,Њ���6T��{5��H$�::��u��0P�k�	];&u�㱘������2�A"�Bo�Q`)~���O5� ��Ohn�`�>o�I���k��4�{?y:f/m#^��GY_ �b��z�U74zk��;p7�(���XrO>,���m��k�(�^��/��pU�@�hQti��E�(�51��jAj�Ȏ?r��q��D�S��)��΢f1D����8 �����֘Qj��í��r�p	�@>�ޖ�].zt��70��巋 Yߠ}�S���K�d.e6U���ֹ�d�6�S&	�
z�3=Iˣd�L��[�g�/כ��a}�[���&�Yz~H��u�g�DJ�>�����Z�^t\���ʔ��"\6�[)�¯+&��>��y��'�H.'�H��H1e@��7C�y12i�!�r�Ec0FPBR�	�@��8���`��~V�:�7V[�7� �C��#��J���.d].��weth� /0�ĂX���ނ\몤��F��t���EWS2Ǐ��Y�G�BX�I����`T#A�:�1���6�r�l��aCn����w�GS��R����SՕ���:gDb�F�1���Sj���:0mq�7w�����q�ukV��?�V�:[�ʞ]��@�%�"+�$^���ׄI!y�ǁ?��Y�ѓ��� K?�?y���1+Q��l���5 2����k���?i�3��/k���$�8�����H
!��H �W��-���n2��@��T`�(u�L_��Z��J2%�71�1��'�1�2k��Eh�M#�L�{h@`�l��%�W�6Y@m���:��oG�A+6b��$=��ȼt+�?�;&4׉
�y�P(asU�4+�o��spQ�F��*ݱ�Ԕ dl�����9�K�S���l��'��K{4�5sRYD�3D�`ʽv�2��7�s#3��6$r�Ԗ�N�����5�7��J(n�&&+�'�4�eAx�G��q4h6��4M���Z�@��n���_��>�p��m�cvΩ�S&�ZC_ws��|O~jDc
�~�Z��&yb|�TXYu�Ŏ�b/(7&�40���O~�u�p��G�V��JC%�`��Jca�R�� �z^���Gm�o�������X����"Z@n.!�x@�����y@�O&����
� ��7}��6�1�Ar�$�*i�1�$2����q�`�݆�N������I��?����1fu�\���d����;k�j\ЌF�~_ٵ�N>%�9G��{���i��	8� l$�f����L#my(7�r�)f/�I�Ҽ�yb��ʤ��?[	��9mhN���P	GS����;�p� `%&�^�	Nw��2;L(�4��O�|tvv����g/iv������~N<��w2��j��[XC�i��%	;��V���x�JlC�Q�ϤF��7׎��&��h�
uQީ�S��1�pf
���s��g�A���Jf���x��F�`���H�wk�~~H^	���?m{�/D��v������:fWiXS<��c i!�|��KA�����E��J��@�
Q�\�4f�@z����bޝ�e�ӑF��!�� �ZIN&p5����G�mҜ�/�����?+���zx���U拥[�g�g��x�ތ���#�`�J�N�pEuF"��8������Z��J�h��ܘ��2�LHu�ɾa}'�������e3��I��}X��q��[G�pאF\k�3sڵ��RV�O4��N���Z���Pv%�7]Z��g�8�C�E�.=�(�a�Af�͟b��<0W]�;���tH�C�/�~}�um�3�Bq���������l�b%)�_��5UD�O�1��ѿ�[�ޓx�-�O�hB=���������5,�m]$\oC���x���0)�_'7|�G� C�Y##���[�'d���w��/�]�$��}Ɂ3�]�;�C�:TBD4��H	a�*��	�&�Y�[~�9V*�K㲾�n��eE�>�}<Y�=��0�9��]-����0v�����w(̑����5A��w|?mG�@A3��>��?)�C�a{y����8�y]݂ړe�o�u�&�eA#��k���m�߂��"��65�I������I��r���)f��F��M9�n���� ��3����XZ{���v�рz����ޥV7�A�Y���<^�b��QPc	rmAX���Ġ?e9J�)"�`�L���޺����ߙ���*�+�u$�y�W(�o�%�p�3��Q��j�_[m�G�(h�9�9�La�GvҼ����`^�6�� �cD��Z1��r�Y~8�P~���U��Am�;ؚxuW�m�	���R�Y%�|�f�xH�Q�9��z��x��R	k��"V}	w9����n#R�%#9h7iq4{2��	�[Ú��.*��3+�̌�lx�JJ��纻�N���#Ӕ��3��-L^�������w`�x�����r;�I8�鸓-�z�0~��Q��f�ID�����m׳�g��9&:��Lt>
Fwe�~p>�k����3���;� �Q�7�Vy��)諀m��b��苅���,>�ό_�`�uj$��W�)�}>�Q�Ee[p���r㤉G-��s��Lr4f�V�%��&�Ď������A��h��8��w�s��=Mֺ��1�)�>ͶON�9x����䬂�c!��rnL��v�*1-޽۰A�C ����S��CC+�i_�%X���B��ўOd�X������*<��a!�dEB`F�>o�ipG�G�fi*�ƇH�!��~�u�0.roxQp�#D���E�c��r�u���?�
x��e�k{� o�ҸJC��`GU���*�l�]�k�Jg'�.��Vؕa�a�D�M���)�p҈�%�y�qET��7-�QØ�
�؍<��H"�j칃����gz̈[͗�w��5!������^.ʂ!���5|Й��/�A#L�-i&h��Z9s ���a��DڣG�Ƕ�s��JE��1�i_jGl�*-��k[Ry�Xi�^�k�,������N
��M�%t�;����D��aRv�� i)n�vz��3R�9/~�]�D��Y;�&���ؚbh��?�]`l?/JbK��e�@�h�rcFO�\���N9Z��{�d*��V�n�
Z[�3,��?lædc��?�Q��0$���TW�����2x�X�d(��:���.uv��EZE��|v�τ�3���*�5r84�5�3`j��õG������>&��¡J��ş�1W�&�>���k:U����VC�rsHf��X�`-���=\|o����'n	������v�T�6~̤8b7*�f����E���3�b0bn��[����6��E�1�:̘��xx��h�H���y�����O��ZI����A�ih1��vk�.�3��� �b�PWYG�\��3��m:���<H<~	���Z٘ރ��/x=��� e��!⺈Ǌ�$|��'�v`omw�F�����4��8L?Ϟ�Ͼ�Ka�Pɨ��q\�/���<��Ѭ�f�2��PN��ga�,��Ͱ��yz7TP��R��Xμj0$3U18� �F�&~^�� :�5�p�����gVD
[Mq���r0ffmM��`)���^����偑��EN
��/c2�����5���ʭ%�51$Je´'�����lvʏ�LO
��5x�Tp��+���T��L��o߷��KAL�>
&9���'x��\�zB��X��Z:��<�-���
!#=�2���3qd��ٔs�(��E�����Sy��sz̷�
�X@�����YDϹ1�u�b���H��"�W2���t���J/���xn��f���L�7�F�]�lX�OY79��V"�6�����!i�R���i����VPj0?����~זkR�P���R���~�hMʪ�k
a7�,��,�q�q^�o�d�t7�<������n(l�K!o�[���5f�t�B�}G�,�pd�6�2!��t'=P1�_A��2����QiT���L�(�E���2���)�v�z��&�5��H������SY�PO��N�sӨVJw����뎍�a˜�%,`+.%W�������U��-ϮZ�N�h֞	l>�5��N�ƨ=|�X��*QZ�s����k�G�!7�G7��u��"����Rs����%����f�2��d�����& S��ô�� ��<��;�df
��@��X�p)(�_KA�j�sY�p�w�O��������q5�v���^ȵ{����p%���U��.�b R��u�ĵ�m�7���}�wԚ��-��ؖ���ʷ�d��h����.@Zn�U�}ä=5��&6��~�o
J�����w��m�>=)fz�`׎�f�w�_�����?����-�c_B~��ұ{U��Eg���AC�Yn=���v !�zV���!9���Q�y�F��e�9(��QEܭ�{�U��6�7;|vⴆ98�攗�>�ۿ�Q�>mE>�S��$�Ń��_w��\�q����GeX;��;i����D�~LD̫�Z�2�q�U��is �?�h�P֕iz_t+��Ԅ�X���$�cY(��5�T�?�vS&��Et�+��{�ӈ�aA6����8QSO�m%���&&%�s�3��`gڸd�S���<#ܴ����))Nti��1����koU".��S!�W�/�@��"�����e�8}�z`a,���俺V�~� �A����H��i:s��&�3K��9�M�=W�"�!���R�K����k|Sz��,A7��Pissl.�&aH�TH:黭L�F2c:��0^�� ��n!�0�w���1����RG�k� :��D��㚹�}[Kڪ����u��j�0�Hy��]/�tcgo7��������BS�r�����?l�@�*����5�!ԝ��>z��ɬD�0�#�R����">9^т��_v�~*��)(��ٓffm��9<���r�&���A�0S�8���Y�n|:�?Y�Of�	4��>����U?X�4q����2V2�"|�C�JW��sS�[�o��>D=C,#�]� ���4��˜�h2B����k�@��zTa�~}��������dI���8�O+��+~�)��N^�e=���C����`ۉ�
o"I�L^�IN�$��7���1�������͏=�~s�>��J�� .[��L��Gs�|zJ+�,�Ld�|MS-�u�p6�S�0�
������� �=!KJ|�K�U�@Q�6����X.ꢕ�mH%�A_��+n�b���q���2�I���@��L&ac��y®@]�&��1d+��[������ �S�z�3�p������X���^@?�wz_������x��QK��e�.�E��|��c���5;Z}o(�=>O��;�᠑��MGㄐ�g�L�!Zb-�\z��o�2��9��yG� d|�Ν��Ĉ��c�BYq�x����O�~��zۖ��e`�E
��X1�Xg�D��m�3�Y���Z�w�Ѷ��Ȼ7}z�Խ;�L3����IO�_���O�<)<=�<���E줆�J�ٸG�k��(Io*�����VqID7��QTJ
&"��������'��l�+�O*��N�f�د4dBly�A���U 8�6μO��@�`���37�K�&�q+o�x���.�M-cLN��MX�~b�Nu��XS�0;3��c�^kr��'|��lYP4����
p`�O$�YN<v��7�C��D@ ����0���Ϡ�ǎ��<_Ie񪻙/����9��7�$&i���jtbRmߞ�+�n��p�/���I�L�g��5y�`A�Y���H�����t���R��Ln�?��H� �.��`�f��2h�Z������N`_��VOͰ�+�9ۢ
���}	�a���%�A�2��}P�!�0�$��
���Vn�����^T�����!���k�Ǻ����J5ɭ/�U;���Z����EH�5��T��iG��b�S�[@VQ�1E���~ RS[j��:��>�%�IP��IՊ�pt}N�*�4Oc�w�f;���o=G�JwE����Z���܆��~�Ɠ�XGG1޷S��t�5�kǤ�p<Ӳr2]�U5�BF3A�Q(B��=
,�/�]���7�	���"�獣9)U�awۜFp�'�@���`���(�Y,<T_�\��B�Fo��}�F�4�K�ɇeU �M��eڋ5�� x�j(-
���.��e�&���C-Hm����G18�]S���xʟ6���Y�,�Ȑ�@���3J����Z��.����������E��"��Ƴ��v$���{*�~�c鐌¥̦��у��:��,�w�$�QA�p�'iy��\��6uK�l��z��<�O}˝�W���6K��r�.�l�H���_��aV�Ջ��V�Q�R�CQ@�æq+e_�u��Ӈz=���d��D	�#)�H��f�?/F&�;DT�h�JH�?���'V�lR�ϪWG��jk ��Du(�Ľ���V����҅��e�������m��&�X0�#k\��[Ѐk]�t���Қ�1���jJ����?��h�R����"i9��c$�Q��#���fR���s:l��ua�����h��[J�іs���T�P��BLԈ3��JBM��V�-��殳����;N�n�*�5��ڊ^���`K_ٳ��y��Sd��$�pϊ�2��	�
��`=��
�Y�O�_]��O?G�΃�?SN�f$��4�9ŋC̙%SQ��֦՞+q���A�x��%��M�5�)=V�Y���� ����96j�0$q*$���V&`#�1�Ph	��t��F�z�qǻ���Q��z	̆g��ʵ|��Y���q�\����%m�yyY���u_5ma�<�n�t�����cfL�F�Zi�)K�����d��P s�U}����NK~���dV�x�r��Ry��h���/;E?�������I3��p��x�p�e����� �b��zi��e7>�러�'
3���ZN@��,a��s�|�C+W�ڡ	�+�⹩�-�7rd��!��Ү�E zUi��e�E4!��c�5�B�
[A=*��]�>N��^a��`�$pAuA쏧����?��C'�������A�Q�{���q�7��^��w�$'h�ݎ����`�G������R���np�%Mx�-�Ё &����9a>=�p\&�y����º�\8��)`�n�A~���LP�ڞ��%%��%��*y��(�v�ki� ,u���6��ՠ��tv���1�y��8W��`j�פh�s�]r&����a�<aW���C���`u�-VDAK��	 ���Q=�m8��N�_�},��v/��;�/GM�^�L�Nۨ%x�2C�Ԣys�t�U�H����7���X��p�� �ɦ�qB�̳o�Q�-�i.����7I�Cp��ݏ�n 2>�F��D_bD�1�R��8��A<A��ܧl�ig�m�P��2��"����T�3u"V���Ƭ��VA���	��h[�o�ݛ>�F�ޝD��qc¤�ݯ]��'c��y����"vRÍP� �l�#t�5GR��7��m�qv��$�R�(*%�W�S��]x���^6Е�'q}'C3a�W2!�������*cg�'�i�B0�a��ץh����7\���u@w��&��1&���&�P?1o�:�u��D��h�1Z�59	��>nw�,(�^J�|8�٧�,��;d���!oj" �FD�S�z���gP�cG�B�����x������x�� ��4E�bn5:1
��o��[7�C8�@��$z��3^ؚ<k� ܬ�D~�JhJ�]�]:M�b��g&7
��ai$Z�A`t�V3�Y4[�����A�Y'��Hl��fX����mQaB�n
վ������\]�>��^��[�vs�Gm{+�����}q/��~I��p��c���Uhq����Ū��Q^��T`@�"��dc�wꉴ#�܌M1�)�- �(���~?��-5Rr�dl���$��Ҥj�r8�>'wP{��1q��j��Qcm����#_��"� �{����}nC�X�W�I�D����[��� E��еcRg8�iY9�.ߪ�_!�� �(������.q�T
����vf���ќ�*Ȱ��mN#���G�c��v0��|����,��W.QU!qC����w��R[�%��ò�*��&ڿV�2���R�W�����n�I��^䊲Y��ߡ�6`���#�Ǯ)�NT<�O�����,jCdH��� ����j����?��-�� ����s���m����G�J�|���^~�����=n?ݱtHF�RfSe��Akh�{I�m�;e�ਠw8ӓ�<Jv.�d���}��r��~֧��N���a�~���D�[6J�t��|�0���Eǅ~+ިL��( aӸ��/��b���C��Wyx2��r���쑎S��x3�#��"*�_4c%$՟@
�x�+�6)�gի#~c�5{�
�:��?�^��H�T�qi�B��2�``~W�A��N	��L,���5.��-h���J�]mdiM���[t5%s����y�A)�U�a�4���F�1ĨS�So	h3)��F�96������~w{4��-��h�9U]y�h�sFd!&j�C߿?%���y���|s��`�O��Y�f��Ț�smE�C�P������ԼP�)��Ic�s.����x��	�vng�3�5����g^��Tn��:̙�oX:+�$�S��H�dr�2� 1���0�`�+e�F��J���&׿�℻�4r6ߺI��&O���h��K֨���b
B� ��p��J�2�{@�'���G�rN��PQ�By��3,��oL0�h��^�K!�UK��rg B���am��	�i�r��QEO��?�����\��`1�(!p�'�2"��=@�":���!�I�:�|�*cYya�Xo�JŒ��(�0���idV��h�x;\���^vy	%��%}
��E����*�/���E�Mp�/>������� ]nY�؇�phQ�����q�EQ�����;�����ט�������{*&̤1��h�N��F�|+����),��� ��l����K��ϒN��n>��L��etL��+3�vX�uw��b��H ���o�a��rH����,��կ?Щ�0�6���t�̎zL�]�3 ����c��x�On��mwo���@�uJ�@0�,����)��0T^i	����ڑ���hTh$.B���L��B��#���]t���
��HDj\<W�F���ى��$H��Ed�ܓ�3�������%z!�ׄj
�����J�,J�+j?(3���N㴃�'+;܉'&ER�ZhG���+��"�S^������������|p���$,2-����J�X2p�
P���2���qi���� ��4w�5g,�� G�H���U�r5?�pάs���eEܠ�]����nh?Xb�c@(@�ou>���;���5��/�B����;���P������o�c�Yf�I����`a��j��&o%M��f,�	q	�����x���;h]J������Fףm�G.u)W�o�c�H��54f�AA
��f�H��+X�ym�Y0&�U4ܝ1�b_�6-��qt�!�NE9�:d�s�0t�s:�!ͳ@0ᒤ��|����6+5)�C_�� ���JT������	�{:L�_Ј��F�Y@s�5���v��$�b��ڭ�S!?��f�-��g{�x?������p�%�m���|�����g��Q���6X�O�a��u-��/��h^Y��+ܴ�-��.}�c��LiEP4M!�HL�'_�i4bhx+U��/����|Wޠ�H��-�W�(|Od{u�(����ƞ�⥑� �o@�X�-�@�Wz����e�������?h��[��WsS	e�Sgq�*ݶ������#Eaa�21:��� Ȗ�~�2[�b��y�HfE{�cEKu�%���I��4a-�E6]� 	[�30��V�Gg*i(0�%�\QC�Q�U���T��g�'�:E4�*;�b�*2*��Ԇ���\��4�`�kK��h1��� �H�mZt�|.�˦Z-���`�'A���=ٿ}m���ٞ���Ѱڏk�&bV���5u�Dy�*[W�;�wz�*)�	�7�� ��x+j���"�q]�I��H+���&/��HJJ��Z��v�[����2 X
��>�?#-���}��RTk	��xjY[��++
�����-�3׿L޹O!01�6��va��+	�Qb�K�����2^�B��(��}��tU����H9�Ne���ɶҭ-�/�K�;���(�������`�j��c_��-q�-���$S�.JA��.����9F]���L����Q�-�j9��5|ů�;��sߞE�r���p�%��!��.��3�Oj<�6=��Y������
���dң� /�"�3�����[sBw���-(X��-�u	�A:�B�D�{���:$�y��6��D��s���*�a[(�95��۔>��Y�3ʁ(_�6�4e�������y�`���:�\5��f�V��^��g����׏��H2[�`�T��@�њ*J@Z���N�	���G!W��a�e��[�W��7P,�2�NT�d*A�u����h\WP�q����nn��l���T�p��:#���	lu�yM5�B��zL�ET������l�E]Y�_���p�yS�Dxw��D���B���i���e�r�3_Ck�a9��}��g����&�%��f~ϣ����WW���>$�pa=Ew;����^�uZ����.��Z(��4����b���M�YA���<"^\�q�U_Pd_!L����O��|k
��4~_��hdm��%�#~)�L�]��䣟��)���;�d�����2x���j����_�T��Ypi��C!��uo\�(f�������#�Cq'��d� ,����̋�b�Q慂�У���Ye����s@�aJG��������oXvlp!��"	��<1 �7u���05��Av)����&���e�'����㧽s����}�R��1RW���_0�:!.4ˏ��x:�Ě���W���xj(?�D~����H	�~���e%1u�z	1��ά�0!c����.~�!�m�������}�g?"�r'�s�f�J��2��h�n
.�fn��v��`�jy�֟�C�&��W��D\���|f����7R��P�W��uJ���,䂚!���2����!x�_�P����
kP��#��.��fG#e�9� K���0�Q�M3��b�M@QuH����� �(�I��A�d�j��9���6��Y��r� =
��a7ؚ;n����K�k<��=c.z|K-���U˛�H�a&��oCz�a�x,�b�8B��] ˯��Z��Aq̘��)�������9Y\���E5hYۢ4����6/'o>���4%J�4�'Y]�'��{t�}�7ӱD�@�����)�g��"�fLȕ�,{"�x��L�e�I����u%�B2͟f<?�u����В�Ʉ^r��ٟ��{�k��xW�{D1Sv��Y�j7�V�����f��j����	�gAW`(��g�l��d-T��3�d�Grh�����C&��B��������kN�ş��Dn���2f79�eȎwA�&��s����h��mT$�`��;�%�c���܉<粼ͼЛi���������nl �)o�:�ŷ���F��c���IP���ete�N�����%R�Ȋ9�S�ʓC�C�L�soF/�FLl�o�pm%^$�Z�2�ROqk˝<���ߦ�lݥ��u�NA`���sz�[Nއ�����űG�v���Y��9B6���
���2*Fc�^�f��ϰU�y�y��j~�B���P@�Z�7�V�a�MH,�Z|�� ��g?@]�N�ٶ�k�a@�Gd�˷F�H^` izs�F/w�#xQ��E@T��|���WkB���p�>t~)M�a�齸�˖�K�ʘ���ӥ!��B���hթ$��8�����f�.�X��[�d���{���F�����-���w��j�L�;�w�_N����U|��W���+e���@���߬�+�P������I�c�k�yN�G�WC\Y;�pi�WB=��e~��_zk��^�֫,Y�r=�-�K �hc���"�`�TlU܌��9�Ć�7w)��8�n�%O2�-����ě΁�4�~��eM�&tn�3��F����4�ѥn�<S9��X��u�wW�*�C>N5B;��'���.q{�S�/;���Ė��� P�7I�[�# ���&YYs��[F�4��Ƣ��({�{�۪��B��i1�uF�J'�:�M�����N=<��h�ͲζT<XjX&ɯ�S��9��[�Z��!뻷�s�{:�0y������
Ū�z֨ZB�[�F�&O����wn�P�<��D�,pӠ.���o�VG���� �ɞ"w)�Y��� B�x̴#� ��[�0ԲAC��Pz�Y��J��g.�OV��:�q���ol9Lqh&&c�� Ѓ� ȁ��}�뷡#c�
Ӽ~� _���8����P�5�7�l�ᦦ�����د�BH�ϓ��C�>-h�~�߇�����kb����)&W��ٵ�$"�$�,z��E�6>��_U� http://vasily.polovnyov.ru/
[vd]: http://dolzhenko.blogspot.com/


## Version 5.2

- at last it's possible to replace indentation TABs with something sensible (e.g. 2 or 4 spaces)
- new keywords and built-ins for 1C by Sergey Baranov
- a couple of small fixes to Apache highlighting


## Version 5.1

This is one of those nice version consisting entirely of new and shiny
contributions!

- [Vladimir Ermakov][vooon] created highlighting for AVR Assembler
- [Ruslan Keba][rukeba] created highlighting for Apache config file. Also his
  original visual style for it is now available for all highlight.js languages
  under the name "Magula".
- [Shuen-Huei Guan][drake] (aka Drake) sent new keywords for RenderMan
  languages. Also thanks go to [Konstantin Evdokimenko][ke] for his advice on
  the matter.

[vooon]: http://vehq.ru/about/
[rukeba]: http://rukeba.com/
[drake]: http://drakeguan.org/
[ke]: http://k-evdokimenko.moikrug.ru/


## Version 5.0

The main change in the new major version of highlight.js is a mechanism for
packing several languages along with the library itself into a single compressed
file. Now sites using several languages will load considerably faster because
the library won't dynamically include additional files while loading.

Also this version fixes a long-standing bug with Javascript highlighting that
couldn't distinguish between regular expressions and division operations.

And as usually there were a couple of minor correctness fixes.

Great thanks to all contributors! Keep using highlight.js.


## Version 4.3

This version comes with two contributions from [Jason Diamond][jd]:

- language definition for C# (yes! it was a long-missed thing!)
- Visual Studio-like highlighting style

Plus there are a couple of minor bug fixes for parsing HTML and XML attributes.

[jd]: http://jason.diamond.name/weblog/


## Version 4.2

The biggest news is highlighting for Lisp, courtesy of Vasily Polovnyov. It's
somewhat experimental meaning that for highlighting "keywords" it doesn't use
any pre-defined set of a Lisp dialect. Instead it tries to highlight first word
in parentheses wherever it makes sense. I'd like to ask people programming in
Lisp to confirm if it's a good idea and send feedback to [the forum][f].

Other changes:

- Smalltalk was excluded from DEFAULT_LANGUAGES to save traffic
- [Vladimir Epifanov][voldmar] has implemented javascript style switcher for
  test.html
- comments now allowed inside Ruby function definition
- [MEL][] language from [Shuen-Huei Guan][drake]
- whitespace now allowed between `<pre>` and `<code>`
- better auto-detection of C++ and PHP
- HTML allows embedded VBScript (`<% .. %>`)

[f]: http://softwaremaniacs.org/forum/highlightjs/
[voldmar]: http://voldmar.ya.ru/
[mel]: http://en.wikipedia.org/wiki/Maya_Embedded_Language
[drake]: http://drakeguan.org/


## Version 4.1

Languages:

- Bash from Vah
- DOS bat-files from Alexander Makarov (Sam)
- Diff files from Vasily Polovnyov
- Ini files from myself though initial idea was from Sam

Styles:

- Zenburn from Vladimir Epifanov, this is an imitation of a
  [well-known theme for Vim][zenburn].
- Ascetic from myself, as a realization of ideals of non-flashy highlighting:
  just one color in only three gradations :-)

In other news. [One small bug][bug] was fixed, built-in keywords were added for
Python and C++ which improved auto-detection for the latter (it was shame that
[my wife's blog][alenacpp] had issues with it from time to time). And lastly
thanks go to Sam for getting rid of my stylistic comments in code that were
getting in the way of [JSMin][].

[zenburn]: http://en.wikipedia.org/wiki/Zenburn
[alenacpp]: http://alenacpp.blogspot.com/
[bug]: http://softwaremaniacs.org/forum/viewtopic.php?id=1823
[jsmin]: http://code.google.com/p/jsmin-php/


## Version 4.0

New major version is a result of vast refactoring and of many contributions.

Visible new features:

- Highlighting of embedded languages. Currently is implemented highlighting of
  Javascript and CSS inside HTML.
- Bundled 5 ready-made style themes!

Invisible new features:

- Highlight.js no longer pollutes global namespace. Only one object and one
  function for backward compatibility.
- Performance is further increased by about 15%.

Changing of a major version number caused by a new format of language definition
files. If you use some third-party language files they should be updated.


## Version 3.5

A very nice version in my opinion fixing a number of small bugs and slightly
increased speed in a couple of corner cases. Thanks to everybody who reports
bugs in he [forum][f] and by email!

There is also a new language — XML. A custom XML formerly was detected as HTML
and didn't highlight custom tags. In this version I tried to make custom XML to
be detected and highlighted by its own rules. Which by the way include such
things as CDATA sections and processing instructions (`<? ... ?>`).

[f]: http://softwaremaniacs.org/forum/viewforum.php?id=6


## Version 3.3

[Vladimir Gubarkov][xonix] has provided an interesting and useful addition.
File export.html contains a little program that shows and allows to copy and
paste an HTML code generated by the highlighter for any code snippet. This can
be useful in situations when one can't use the script itself on a site.


[xonix]: http://xonixx.blogspot.com/


## Version 3.2 consists completely of contributions:

- Vladimir Gubarkov has described SmallTalk
- Yuri Ivanov has described 1C
- Peter Leonov has packaged the highlighter as a Firefox extension
- Vladimir Ermakov has compiled a mod for phpBB

Many thanks to you all!


## Version 3.1

Three new languages are available: Django templates, SQL and Axapta. The latter
two are sent by [Dmitri Roudakov][1]. However I've almost entirely rewrote an
SQL definition but I'd never started it be it from the ground up :-)

The engine itself has got a long awaited feature of grouping keywords
("keyword", "built-in function", "literal"). No more hacks!

[1]: http://roudakov.ru/


## Version 3.0

It is major mainly because now highlight.js has grown large and has become
modular. Now when you pass it a list of languages to highlight it will
dynamically load into a browser only those languages.

Also:

- Konstantin Evdokimenko of [RibKit][] project has created a highlighting for
  RenderMan Shading Language and RenderMan Interface Bytestream. Yay for more
  languages!
- Heuristics for C++ and HTML got better.
- I've implemented (at last) a correct handling of backslash escapes in C-like
  languages.

There is also a small backwards incompatible change in the new version. The
function initHighlighting that was used to initialize highlighting instead of
initHighlightingOnLoad a long time ago no longer works. If you by chance still
use it — replace it with the new one.

[RibKit]: http://ribkit.sourceforge.net/


## Version 2.9

Highlight.js is a parser, not just a couple of regular expressions. That said
I'm glad to announce that in the new version 2.9 has support for:

- in-string substitutions for Ruby -- `#{...}`
- strings from from numeric symbol codes (like #XX) for Delphi


## Version 2.8

A maintenance release with more tuned heuristics. Fully backwards compatible.


## Version 2.7

- Nikita Ledyaev presents highlighting for VBScript, yay!
- A couple of bugs with escaping in strings were fixed thanks to Mickle
- Ongoing tuning of heuristics

Fixed bugs were rather unpleasant so I encourage everyone to upgrade!


## Version 2.4

- Peter Leonov provides another improved highlighting for Perl
- Javascript gets a new kind of keywords — "literals". These are the words
  "true", "false" and "null"

Also highlight.js homepage now lists sites that use the library. Feel free to
add your site by [dropping me a message][mail] until I find the time to build a
submit form.

[mail]: mailto:Maniac@SoftwareManiacs.Org


## Version 2.3

This version fixes IE breakage in previous version. My apologies to all who have
already downloaded that one!


## Version 2.2

- added highlighting for Javascript
- at last fixed parsing of Delphi's escaped apostrophes in strings
- in Ruby fixed highlighting of keywords 'def' and 'class', same for 'sub' in
  Perl


## Version 2.0

- Ruby support by [Anton Kovalyov][ak]
- speed increased by orders of magnitude due to new way of parsing
- this same way allows now correct highlighting of keywords in some tricky
  places (like keyword "End" at the end of Delphi classes)

[ak]: http://anton.kovalyov.net/


## Version 1.0

Version 1.0 of javascript syntax highlighter is released!

It's the first version available with English description. Feel free to post
your comments and question to [highlight.js forum][forum]. And don't be afraid
if you find there some fancy Cyrillic letters -- it's for Russian users too :-)

[forum]: http://softwaremaniacs.org/forum/viewforum.php?id=6
