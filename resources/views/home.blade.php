<x-layout.layout class="layout" :patients="$patients" :chosenpatient="$chosenpatient">

    @php
        $style = 'style="background-color: #718096; padding:5px; margin:5px; height:100px;"';
        $style15 = 'style="background-color: #718096; padding:5px; margin:5px; height:100px; grid-column: 1 / span 2;"';
    @endphp

        <article>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam id felis ut sem sagittis faucibus. Pellentesque
            eu mollis nulla. Aliquam pellentesque est non nunc finibus, id mollis augue dignissim. Class aptent taciti
            sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque ultrices efficitur diam, eu
            pharetra nulla. Cras ultricies sapien ut tellus scelerisque tincidunt. Suspendisse laoreet non sem non bibendum.
            Aliquam facilisis urna ac magna dictum, non volutpat ipsum fermentum. Aenean vel leo et urna dictum fermentum
            sed eget felis. Maecenas vitae diam consectetur, aliquet sapien eu, finibus metus. Maecenas venenatis, mi at
            aliquet aliquet, neque lorem dictum elit, ac imperdiet quam dui non velit.

            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tempor
            sagittis facilisis. Fusce ut interdum magna. Maecenas auctor ante urna, non porttitor libero eleifend nec. Sed
            rutrum convallis nulla, ut ultricies dui tempus vel. Phasellus luctus leo at eros semper consectetur. Ut mollis
            diam nec scelerisque malesuada. Duis blandit dignissim mattis. Vivamus consequat porta volutpat.

            Nam sit amet ornare dui. Fusce sollicitudin ultricies justo, nec accumsan augue volutpat ut. Fusce vitae
            vulputate felis. Quisque pulvinar elementum lorem, id maximus massa elementum nec. Praesent mollis lectus vel
            sem consequat dapibus. Morbi lobortis eros blandit, tincidunt elit vitae, pulvinar ex. Vestibulum consequat,
            lorem eu iaculis tincidunt, ex eros rhoncus libero, sit amet interdum leo leo quis leo. Integer quis facilisis
            nunc, nec tempus turpis. Aliquam cursus augue vitae mauris tristique, vel sagittis ipsum luctus. Ut condimentum
            augue molestie vulputate imperdiet. Sed hendrerit vestibulum diam. Etiam viverra enim ligula, eu semper lectus
            consectetur ac. Sed luctus bibendum aliquam. Morbi finibus sit amet velit vitae ultrices. In pellentesque
            facilisis odio sit amet varius.

            Morbi non feugiat elit. Mauris in sodales elit. Nulla at libero eros. Praesent lobortis molestie varius.
            Maecenas iaculis consequat nulla, quis interdum ipsum efficitur eu. Sed mauris augue, vulputate eu rhoncus nec,
            sagittis et elit. Aliquam sit amet nunc leo. Fusce rhoncus luctus nisl a convallis. Aliquam vehicula erat
            condimentum ullamcorper aliquet.

            In pulvinar erat libero, eu pulvinar arcu ornare et. Ut in augue hendrerit risus convallis commodo quis in ex.
            Sed elementum quis ipsum commodo gravida. Nunc hendrerit, odio a lobortis blandit, erat enim blandit ante, ut
            sagittis turpis orci at dui. Ut scelerisque libero vel augue rutrum, non cursus odio efficitur. Mauris metus
            purus, viverra viverra iaculis in, hendrerit ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nulla eu dui eget odio blandit imperdiet ut eget eros. Suspendisse vel augue quam. Nunc sed euismod mi. Sed
            finibus erat non luctus auctor. Ut tristique sapien vitae magna volutpat euismod. Phasellus posuere massa nulla,
            sed vehicula felis eleifend vitae. Duis quis tincidunt nunc.

            <div style="display:grid; grid-template-columns: repeat(2,1fr);">
                <div {!! $style15 !!}>001</div>
                <div {!! $style !!}>111</div>
                <div {!! $style !!}>222</div>
                <div {!! $style !!}>333</div>
                <div {!! $style !!}>444</div>
            </div>

            Morbi non feugiat elit. Mauris in sodales elit. Nulla at libero eros. Praesent lobortis molestie varius.
            Maecenas iaculis consequat nulla, quis interdum ipsum efficitur eu. Sed mauris augue, vulputate eu rhoncus nec,
            sagittis et elit. Aliquam sit amet nunc leo. Fusce rhoncus luctus nisl a convallis. Aliquam vehicula erat
            condimentum ullamcorper aliquet.

            In pulvinar erat libero, eu pulvinar arcu ornare et. Ut in augue hendrerit risus convallis commodo quis in ex.
            Sed elementum quis ipsum commodo gravida. Nunc hendrerit, odio a lobortis blandit, erat enim blandit ante, ut
            sagittis turpis orci at dui. Ut scelerisque libero vel augue rutrum, non cursus odio efficitur. Mauris metus
            purus, viverra viverra iaculis in, hendrerit ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nulla eu dui eget odio blandit imperdiet ut eget eros. Suspendisse vel augue quam. Nunc sed euismod mi. Sed
            finibus erat non luctus auctor. Ut tristique sapien vitae magna volutpat euismod. Phasellus posuere massa nulla,
            sed vehicula felis eleifend vitae. Duis quis tincidunt nunc.

            Ut tellus mauris, convallis in mollis vel, sagittis sit amet leo. In hac habitasse platea dictumst. Vestibulum
            luctus, nulla et vestibulum tristique, ligula odio tristique tellus, eget egestas enim nisl sit amet augue.
            Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ut velit tellus. Nullam eu malesuada nisi.
            Vestibulum rutrum viverra.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam id felis ut sem sagittis faucibus. Pellentesque
            eu mollis nulla. Aliquam pellentesque est non nunc finibus, id mollis augue dignissim. Class aptent taciti
            sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque ultrices efficitur diam, eu
            pharetra nulla. Cras ultricies sapien ut tellus scelerisque tincidunt. Suspendisse laoreet non sem non bibendum.
            Aliquam facilisis urna ac magna dictum, non volutpat ipsum fermentum. Aenean vel leo et urna dictum fermentum
            sed eget felis. Maecenas vitae diam consectetur, aliquet sapien eu, finibus metus. Maecenas venenatis, mi at
            aliquet aliquet, neque lorem dictum elit, ac imperdiet quam dui non velit.

            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tempor
            sagittis facilisis. Fusce ut interdum magna. Maecenas auctor ante urna, non porttitor libero eleifend nec. Sed
            rutrum convallis nulla, ut ultricies dui tempus vel. Phasellus luctus leo at eros semper consectetur. Ut mollis
            diam nec scelerisque malesuada. Duis blandit dignissim mattis. Vivamus consequat porta volutpat.

            Nam sit amet ornare dui. Fusce sollicitudin ultricies justo, nec accumsan augue volutpat ut. Fusce vitae
            vulputate felis. Quisque pulvinar elementum lorem, id maximus massa elementum nec. Praesent mollis lectus vel
            sem consequat dapibus. Morbi lobortis eros blandit, tincidunt elit vitae, pulvinar ex. Vestibulum consequat,
            lorem eu iaculis tincidunt, ex eros rhoncus libero, sit amet interdum leo leo quis leo. Integer quis facilisis
            nunc, nec tempus turpis. Aliquam cursus augue vitae mauris tristique, vel sagittis ipsum luctus. Ut condimentum
            augue molestie vulputate imperdiet. Sed hendrerit vestibulum diam. Etiam viverra enim ligula, eu semper lectus
            consectetur ac. Sed luctus bibendum aliquam. Morbi finibus sit amet velit vitae ultrices. In pellentesque
            facilisis odio sit amet varius.

            Morbi non feugiat elit. Mauris in sodales elit. Nulla at libero eros. Praesent lobortis molestie varius.
            Maecenas iaculis consequat nulla, quis interdum ipsum efficitur eu. Sed mauris augue, vulputate eu rhoncus nec,
            sagittis et elit. Aliquam sit amet nunc leo. Fusce rhoncus luctus nisl a convallis. Aliquam vehicula erat
            condimentum ullamcorper aliquet.

            In pulvinar erat libero, eu pulvinar arcu ornare et. Ut in augue hendrerit risus convallis commodo quis in ex.
            Sed elementum quis ipsum commodo gravida. Nunc hendrerit, odio a lobortis blandit, erat enim blandit ante, ut
            sagittis turpis orci at dui. Ut scelerisque libero vel augue rutrum, non cursus odio efficitur. Mauris metus
            purus, viverra viverra iaculis in, hendrerit ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nulla eu dui eget odio blandit imperdiet ut eget eros. Suspendisse vel augue quam. Nunc sed euismod mi. Sed
            finibus erat non luctus auctor. Ut tristique sapien vitae magna volutpat euismod. Phasellus posuere massa nulla,
            sed vehicula felis eleifend vitae. Duis quis tincidunt nunc.

            Ut tellus mauris, convallis in mollis vel, sagittis sit amet leo. In hac habitasse platea dictumst. Vestibulum
            luctus, nulla et vestibulum tristique, ligula odio tristique tellus, eget egestas enim nisl sit amet augue.
            Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ut velit tellus. Nullam eu malesuada nisi.
            Vestibulum rutrum viverra.
        </article>

</x-layout.layout>
