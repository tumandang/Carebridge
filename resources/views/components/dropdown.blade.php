<div {{ $attributes }}>
    <div class="relative inline-block text-left"
        x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.open = true
            },
            close(focusAfter) {
                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']">
    <div>
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
        {{$name}}
       
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
        </button>
    </div>


    <div  x-ref="panel"
            x-show="open"
            x-transition.origin.top.right
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            style="display: none;"
            class="z-50 origin-top-right absolute {{$panelPosition}}-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">

               
                   @foreach($options as $key => $option)
                      @if($type == 'link')
                         <a href="#" x-on:click="close($refs.button)" class="text-gray-800  no-underline block px-4 py-2 text-sm font-semibold" role="menuitem" tabindex="-1" id="menu-item-{{$key}}">{{$option}}</a>
                      @endif
                      @if($type == 'checkbox')
                      <div class="relative flex items-start ml-3 my-2">
                      <div class="flex items-center h-5">
                         <input id="{{$name}}-{{$key}}"  value="{{$key}}" aria-describedby="comments-description" name="{{$name}}-{{$key}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                      </div>
                      <div class="ml-3 text-sm">
                          <label for="{{$name}}-{{$key}}" class=" font-semibold text-gray-800">{{$option}}</label>
                      </div>
                     </div>
                      @endif
                   @endforeach
            </div>
    </div>
    </div>
</div>