<?php
component("head");
component("navbar");
?>

<div name="content" class="w-5/6 mx-auto flex justify-around mt-4">





    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
        <div class="relative h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
            <img src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="card-image" />
        </div>
        <div class="p-6">
            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                Was ist Codersbook?
            </h5>
            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Codersbook ist ein soziales netzwerk, welches versucht mit der neuesten Webtechnologue Develoüer und IT-Interessirten miteinander zu verbinden.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat cum quia odio aliquam, illo dolore voluptas qui et fuga, ea accusamus sint! Nam eos sunt labore voluptatum officiis excepturi doloremque facilis beatae quaerat libero, dignissimos aperiam! Harum a eos fugiat quae unde dicta minima soluta animi officia, dignissimos sit omnis voluptas odio iure ipsum sequi non aut quia laboriosam dolorem?
            </p>
        </div>
        <div class="p-6 pt-0">
            <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                Lerne Mehr darüber
            </button>
        </div>
    </div>


    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
        <div class="relative h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
            <img src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="card-image" />
        </div>
        <div class="p-6">
            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                Features
            </h5>
            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Codersbook bieten neben einem freundschaftsystem auch ein Followersystem sowie auch ein Like Comment und Alertsystem. Zudem wird als Designframework TailwindCSS verwendet und
                für die Usersuche AJAX.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus molestiae incidunt nemo beatae minima nobis id possimus, explicabo reiciendis asperiores, quae quaerat iste accusamus ab nulla provident maiores totam fugit!
            </p>
        </div>
    </div>

    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
        <div class="relative h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
            <img src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="card-image" />
        </div>
        <div class="p-6">
            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                Sign up / Login
            </h5>
            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                Werde heute noch teil dieser Community und regestriere dich.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga doloremque omnis enim ipsum nostrum deleniti culpa, porro distinctio dolore magni atque. Quis, at ducimus nobis deleniti maiores qui dolores earum, totam sint consequatur, aliquid saepe voluptatum sunt accusamus. Labore nam magni tempore maxime animi architecto mollitia eaque expedita dolor ut.
            </p>
        </div>
        <div class="p-6 pt-0">
            <a href="/signup" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                Sign Up
            </a>
            <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                Login
            </button>
        </div>
    </div>






</div>
<?php
component("footer");
?>