<x-layout.layout class="layout" :patients="$patients" :chosenpatient="$chosenpatient">

    @php
        $style = 'style="background-color: #718096; padding:5px; margin:5px; height:100px;"';
        $style15 = 'style="background-color: #718096; padding:5px; margin:5px; height:100px; grid-column: 1 / span 2;"';
    @endphp

        <article>
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
        </article>

</x-layout.layout>
