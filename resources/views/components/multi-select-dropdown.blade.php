@props([
    'selectedOptions',
    'list'
])

<div class="msa-wrapper w-full" x-data="multiselectComponent()" x-init="$watch('selected', value => selectedString = value.join(','))">
    {{-- <label for="msa-input">Select some skills</label> --}}
    <input 
           x-model="selectedString" 
           type="text" id="msa-input" 
           aria-hidden="true" 
           x-bind:aria-expanded="listActive.toString()" 
           aria-haspopup="tag-list"
           hidden>

    <div class="input-presentation" @click="listActive = !listActive" @click.away="listActive = false" x-bind:class="{'active': listActive}">
      <span class="placeholder" x-show="selected.length == 0">Select Skills</span>
      <template x-for="(tag, index) in selected">
        <div class="tag-badge">
          <span x-text="tag.name"></span>
          <button x-bind:data-index="index" @click.stop="removeMe($event)">x</button>
        </div>
      </template>
    </div>

    <ul id="tag-list" x-show.transition="listActive" role="listbox">
      <template x-for="(tag, index, collection) in unselected">
        <li x-show="!selected.includes(tag)" 
            x-bind:value="tag.id" 
            x-text="tag.name" 
            aria-role="button" 
            @click.stop="addMe($event)" 
            x-bind:data-index="index"
            role="option"
         ></li>
      </template>
    </ul>
  </div>

  <div>
    {{ $slot }}
  </div>


  <script>
    function multiselectComponent() {
        return {
            listActive: false,
            selectedString: '',
            selected: @entangle($selectedOptions),
            unselected:@entangle($list),
            addMe(e) {
            const index = e.target.dataset.index;
            const extracted = this.unselected.splice(index, 1);
            this.selected.push(extracted[0]);
            },
            removeMe(e) {
            const index = e.target.dataset.index;
            const extracted = this.selected.splice(index, 1);
            this.unselected.push(extracted[0]);
            }
        };
        }

  </script>

  <style>
    * {
    font-family: sans-serif;
    box-sizing: border-box;
    // This is not recommended in production
    outline: none;
    }

    [hidden] {
    display: none !important;
    }

    .msa-wrapper {
    /* width: 400px; */

    &:focus-within {
        .input-presentation {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }
    }

    & > * {
        display: block;
        width: 100%;
    }

  .input-presentation {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    align-items: center;
    min-height: 40px;
    padding: 6px 40px 6px 12px;
    border: 1px solid rgba(0, 0, 0, 0.3);
    font-size: 1rem;
    border-radius: 10px;
    position: relative;
    cursor: pointer;
    /* width: 100%; */
    
    .placeholder {
      font-weight: 400;
      color: rgba(0,0,0, .6);
    }
    
    &:after {
      content: '';
      border-top: 6px solid black;
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      right: 14px;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }
    
    &.active {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }

    .tag-badge {
      background-color: blueviolet;
      padding-left: 14px;
      padding-right: 28px;
      color: white;
      border-radius: 14px;
      position: relative;

      span {
        font-size: 16px;
        line-height: 27px;
      }

      button {
        display: inline-block;
        padding: 0;
        -webkit-appearance: none;
        appearance: none;
        background: transparent;
        border: none;
        color: rgba(255,255,255, .8);
        font-size: 12px;
        position: absolute;
        right: 0px;
        padding-right: 10px;
        padding-left: 5px;
        cursor: pointer;
        line-height: 26px;
        height: 26px;
        font-weight: 600;
        
        &:hover {
          background-color: rgba(255,255,255, .2);
          color: white;
        }
      }
    }
  }

  ul {
    border: 1px solid rgba(0, 0, 0, 0.3);
    font-size: 1rem;
    margin: 0;
    padding: 0;
    border-top: none;
    list-style: none;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;

    li {
      padding: 6px 12px;
      text-transform: capitalize;
      cursor: pointer;

      &:hover {
        background: blueviolet;
        color: white;
      }
        }
    }
    }

  </style>