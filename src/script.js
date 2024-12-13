console.log('abde');

const terrain = document.getElementById('terrain')
const nav = document.getElementById('left_bar')
const berger_menu = document.getElementById('berger_menu')
const form = document.getElementById('form')
const icone_previus = berger_menu.childNodes[0].nextSibling
const card = document.createElement('div')
const div_detaille = document.createElement('div')
const p = document.createElement('p')
const div_detaille_elem = document.createElement('div')
const div_natio_club = document.createElement('div')
const div_position = document.createElement('div')
const div_position_left = document.createElement('div')
const div_position_right = document.createElement('div')
const img = document.createElement('img')
const div = document.createElement('div')
const img_card = document.createElement('img')
const ch_container = document.getElementById('chengement')

const closeNav = () => {
  nav.classList.add('telephone:w-1/12')
}

const toggle = () => {
  nav.classList.toggle('telephone:w-1/12')

  if (nav.classList.contains('desktop:w-96')) {
    nav.classList.replace('desktop:w-96', 'desktop:w-14')
    terrain.classList.replace('bg-right', 'bg-center')
    terrain.classList.replace('w-8/12', 'w-11/12')
    document.forms[0].classList.replace('w-80', 'w-2')
  } else {
    nav.classList.replace('desktop:w-14', 'desktop:w-96')
    terrain.classList.replace('bg-center', 'bg-right')
    terrain.classList.replace('w-11/12', 'w-8/12')
    document.forms[0].classList.replace('w-2', 'w-80')
  }

  if (form.style.opacity == 1 || !form.style.opacity) {
    icone_previus.classList?.replace('fa-arrow-left', 'fa-bars')
    form.style.opacity = 0
  } else {
    icone_previus.classList.replace('fa-bars', 'fa-arrow-left')
    form.style.opacity = 1
  }
}

const fetchDataAndStore = async () => {
  try {
    const response = await fetch('./Api/players.json')
    if (!response.ok) {
      throw new Error('Failed to fetch data')
    }

    const jsonData = await response.json()

    const transformedData = {
      GK: jsonData.players.filter(player => player.position === 'GK'),
      CB: jsonData.players.filter(player => player.position === 'CB'),
      LB: jsonData.players.filter(player => player.position === 'LB'),
      RB: jsonData.players.filter(player => player.position === 'RB'),
      CM: jsonData.players.filter(player => player.position === 'CM'),
      RW: jsonData.players.filter(player => player.position === 'RW'),
      LW: jsonData.players.filter(player => player.position === 'LW'),
      ST: jsonData.players.filter(player => player.position === 'ST')
    }

    if (
      !localStorage.hasOwnProperty('countStoredData') ||
      localStorage.getItem('countStoredData') == null
    ) {
      localStorage.setItem('playersData', JSON.stringify(transformedData))
      localStorage.setItem('countStoredData', true)
    }
  } catch (error) {
    console.error('Error fetching data:', error)
  }
}

fetchDataAndStore()

let storedData = localStorage.getItem('playersData')
let dataLocal = storedData ? JSON.parse(storedData) : {}
let data = { ...dataLocal }

const formations = [
  [
    { left: '41%', bottom: '0%' },
    { left: '9%', bottom: '27%' },
    { left: '30%', bottom: '25%' },
    { left: '52%', bottom: '25%' },
    { left: '73%', bottom: '27%' },
    { left: '20%', bottom: '54%' },
    { left: '41%', bottom: '52%' },
    { left: '62.3%', bottom: '54%' },
    { left: '21.5%', bottom: '84%' },
    { left: '41%', bottom: '84%' },
    { left: '61%', bottom: '84%' }
  ],
  [
    { left: '41%', bottom: '0%' },
    { left: '9%', bottom: '27%' },
    { left: '30%', bottom: '25%' },
    { left: '52%', bottom: '25%' },
    { left: '73%', bottom: '27%' },
    { left: '31%', bottom: '52%' },
    { left: '51%', bottom: '52%' },
    { left: '70%', bottom: '56%' },
    { left: '11.5%', bottom: '56%' },
    { left: '33%', bottom: '84%' },
    { left: '51%', bottom: '84%' }
  ]
]

const createCard = () => {
  card.classList.add('card')
  div_detaille.classList.add('card_detaille')
  div_detaille_elem.classList.add('card_detaille_elem')
  p.classList.add('card_paragraph')
  div_position.classList.add('card_position')
  img_card.classList.add('card_image')
  const div = document.createElement('div')
  div.classList.add('relative')
  div.classList.add('w-full')
  div.classList.add('grid')
  div.classList.add('justify-center')
  div_natio_club.classList.add('flex')
  div_natio_club.classList.add('gap-2')
  div_natio_club.classList.add('items-center')
  div_natio_club.classList.add('div_natio_club')

  div_position.appendChild(div_position_left)
  div_position.appendChild(div_position_right)

  div_detaille.appendChild(p)
  div_detaille.appendChild(div_detaille_elem)
  div_detaille.appendChild(div_natio_club)

  div.appendChild(div_position)
  div.appendChild(div_detaille)
  card.append(div)
  div_position.children[0].classList.add('card_rating')

  appendCards(card)
}

const p_detaille = document.createElement('p')
p_detaille.style.fontWeight = '700'
p_detaille.style.fontSize = '12px'

const append_changement = position => {
  const data_chang = data[position].filter(d => d.active == false)

  data_chang.forEach((data, index) => {
    console.log('playerData', data)

    const cardElement = card.cloneNode(true)

    // const svg_settings = document.getElementById('Layer_1').cloneNode(true)
    // svg_settings.classList.remove('hidden')
    // svg_settings.classList.add('absolute')
    // svg_settings.classList.add('right-1')
    // svg_settings.classList.add('top-7')
    // svg_settings.setAttribute('data_id', playerData.id)
    // svg_settings.setAttribute('position', playerData.position)

    // cardElement.append(svg_settings)

    cardElement.children[0].children[1].children[0].textContent = data.name
      .toLocaleLowerCase()
      .split(' ')[0]
    cardElement.children[0].children[0].children[0].textContent = data.rating
    cardElement.children[0].children[0].children[1].textContent = data.position
    img_card.src = data.photo
    cardElement.children[0].appendChild(img_card.cloneNode(true))

    stats[position == 'GK' ? 1 : 0].forEach(stat => {
      const divStat = div.cloneNode(true)
      const pStat = p_detaille.cloneNode(true)

      pStat.textContent = data[stat[1]]
      divStat.textContent += stat[0]
      divStat.appendChild(pStat)

      cardElement.children[0].children[1].children[1].appendChild(divStat)
    })

    const img_nationality = img.cloneNode(true)
    img_nationality.src = data.flag.replace(/&amp;/g, '&')

    const img_club = img.cloneNode(true)
    img_club.src = data.logo.replace(/&amp;/g, '&')

    cardElement.children[0].children[1].children[2].appendChild(img_nationality)
    cardElement.children[0].children[1].children[2].appendChild(img_club)

    ch_container.appendChild(cardElement)
  })
}

const fill_cards_by_position = (position, count, startIndex) => {
  const positionData =
    JSON.stringify(data[position]) != '{}'
      ? data[position]?.filter(d => d.active === true).slice(0, count)
      : null

  if (positionData == null || positionData.length == 0) {
    return
  }

  positionData.forEach((playerData, index) => {
    const cardElement = card.cloneNode(true)

    const svg_settings = document.getElementById('Layer_1').cloneNode(true)
    svg_settings.classList.remove('hidden')
    svg_settings.classList.add('absolute')
    svg_settings.classList.add('right-1')
    svg_settings.classList.add('top-7')
    svg_settings.setAttribute('data_id', playerData.id)
    svg_settings.setAttribute('position', playerData.position)

    cardElement.append(svg_settings)

    cardElement.children[0].children[1].children[0].textContent =
      playerData.name.toLocaleLowerCase().split(' ')[0]
    cardElement.children[0].children[0].children[0].textContent =
      playerData.rating
    cardElement.children[0].children[0].children[1].textContent =
      playerData.position
    img_card.src = playerData.photo
    cardElement.children[0].appendChild(img_card.cloneNode(true))

    stats[position == 'GK' ? 1 : 0].forEach(stat => {
      const divStat = div.cloneNode(true)
      const pStat = p_detaille.cloneNode(true)

      pStat.textContent = playerData[stat[1]]
      divStat.textContent += stat[0]
      divStat.appendChild(pStat)

      cardElement.children[0].children[1].children[1].appendChild(divStat)
    })

    if (position === 'CM' && index === 1) {
      cardElement.style.marginTop = '1rem'
    }

    const img_nationality = img.cloneNode(true)
    img_nationality.src = playerData.flag.replace(/&amp;/g, '&')

    const img_club = img.cloneNode(true)
    img_club.src = playerData.logo.replace(/&amp;/g, '&')

    cardElement.children[0].children[1].children[2].appendChild(img_nationality)
    cardElement.children[0].children[1].children[2].appendChild(img_club)

    const formationIndex = startIndex + index

    cardElement.style.left =
      formations[window.localStorage.getItem('formation')][formationIndex].left
    cardElement.style.bottom =
      formations[window.localStorage.getItem('formation')][
        formationIndex
      ].bottom

    terrain.children[formationIndex].children[0]
      ? terrain.children[formationIndex].children[0].replaceWith(cardElement)
      : terrain.children[formationIndex].appendChild(cardElement)
  })

  append_changement(position)
}

const removeCard = event => {
  const id = event.currentTarget.parentElement.getAttribute('data_id')
  const position = event.currentTarget.parentElement.getAttribute('position')
  const index = data[position].findIndex(d => d.id == id)
  data[position].splice(index, 1)
  localStorage.setItem('playersData', JSON.stringify(data))
  appendCards()
  location.reload()
}

const editCard = async event => {
  const target = event.currentTarget
  const id = target.parentElement.getAttribute('data_id')
  const position = target.parentElement.getAttribute('position')
  const data_filter = data[position].filter(d => d.id == id)
  const card_id = target.parentElement.parentElement.parentElement.id

  document.querySelector('[name="name"]').value = data_filter[0].name
  document.querySelector('[name="rating"]').value = data_filter[0].rating
  document.querySelector('[name="position"]').value = data_filter[0].position
  document.querySelector('[name="logo"]').value = data_filter[0].logo
  document.querySelector('[name="pace"]').value = data_filter[0].pace
  document.querySelector('[name="shooting"]').value = data_filter[0].shooting
  document.querySelector('[name="passing"]').value = data_filter[0].passing
  document.querySelector('[name="dribbling"]').value = data_filter[0].dribbling
  document.querySelector('[name="defending"]').value = data_filter[0].defending
  document.querySelector('[name="physical"]').value = data_filter[0].physical
  document.querySelector('[name="diving"]').value = data_filter[0].diving
  document.querySelector('[name="handling"]').value = data_filter[0].handling
  document.querySelector('[name="kicking"]').value = data_filter[0].kicking
  document.querySelector('[name="reflexes"]').value = data_filter[0].reflexes
  document.querySelector('[name="speed"]').value = data_filter[0].speed
  document.querySelector('[name="positioning"]').value =
    data_filter[0].positioning

  const update_button = document.getElementById('update_button')
  update_button.setAttribute('data_id', data_filter[0].id)
  update_button.setAttribute('position', data_filter[0].position)
  update_button.setAttribute('card_id', card_id)
  const add_button = document.getElementById('add_button')
  update_button.classList.remove('hidden')
  add_button.classList.add('hidden')
}

const updateCard = event => {
  const target = event.currentTarget
  const id = target.getAttribute('data_id')
  const position = target.getAttribute('position')
  const card_id = target.getAttribute('card_id')
  const data_filter = data[position].filter(d => d.id == id)

  const card_to_update = document.getElementById(`${card_id}`)
  const img = card_to_update.children[0].children[0].children[2]

  console.log('img', img)

  names = [
    [
      'position',
      'name',
      'flag',
      'photo',
      'logo',
      'rating',
      'pace',
      'shooting',
      'passing',
      'dribbling',
      'defending',
      'physical'
    ],
    [
      'position',
      'name',
      'flag',
      'photo',
      'logo',
      'rating',
      'diving',
      'handling',
      'kicking',
      'reflexes',
      'speed',
      'positioning'
    ]
  ]

  const type_position = position == 'GK' ? 1 : 0

  for (let i = 0; i < names[type_position].length; i++) {
    data_filter[0][`${names[type_position][i]}`] = document.querySelector(
      `[name="${names[type_position][i]}"]`
    ).value
  }

  const blob = new Blob([document.querySelector(`[name="photo"]`)], {
    type: 'image/png'
  })
  data_filter[0]['photo'] = URL.createObjectURL(blob)
  img.src = 'URL.createObjectURL(blob)'
  const isValidat = validation(data_filter[0], names, position)
  console.log(isValidat)

  for (let i = 0; i < names[type_position].length; i++) {
    document.querySelector(`[name="${names[type_position][i]}"]`).value = ''
  }

  console.log(target.parentElement.parentElement.parentElement)

  localStorage.setItem('playersData', JSON.stringify(data))
  appendCards()
}

var stats = [
  [
    ['PC', 'pace'],
    ['SH', 'shooting'],
    ['PS', 'passing'],
    ['DR', 'dribbling'],
    ['DE', 'defending'],
    ['PH', 'physical']
  ],
  [
    ['DV', 'diving'],
    ['HD', 'handling'],
    ['KC', 'kicking'],
    ['REF', 'reflexes'],
    ['SP', 'speed'],
    ['PS', 'positioning']
  ]
]

const terrainArry = Array.from(terrain.children)

const defaultCardShow = () => {
  const typeF = window.localStorage.getItem('formation')
    ? window.localStorage.getItem('formation')
    : 1

  document.getElementById('formation_selected').value = typeF

  formations[typeF].map((e, i) => {
    const div = document.createElement('div')
    div.setAttribute('id', `card_${i}`)
    div.style.position = 'absolute'
    div.style.left = formations[typeF][i].left
    div.style.bottom = formations[typeF][i].bottom
    div.classList.add('transition-all')
    div.classList.add('duration-700')
    div.classList.add('ease-in-out')

    terrain.appendChild(div.cloneNode(true))
  })
}

function handleForamtion (event) {
  formations[event.currentTarget.value].map((p, i) => {
    terrain.children[i].style.left = p.left
    terrain.children[i].style.bottom = p.bottom
  })
  window.localStorage.setItem('formation', event.currentTarget.value)
}

const emptyCHang = () => {
  while (ch_container.firstChild) {
    ch_container.removeChild(ch_container.firstChild)
  }
}

const appendCards = () => {
  emptyCHang()
  defaultCardShow()
  fill_cards_by_position('GK', 1, 0)
  fill_cards_by_position('LB', 1, 1)
  fill_cards_by_position('CB', 2, 2)
  fill_cards_by_position('RB', 1, 4)
  fill_cards_by_position('CM', 3, 5)
  fill_cards_by_position('LW', 1, 8)
  fill_cards_by_position('ST', 1, 9)
  fill_cards_by_position('RW', 1, 10)

  const position_type = window.localStorage.getItem('formation')

  Array.from(terrain.children).map((e, i) => {
    if (i > 10) {
      return
    }
    card.style.left = formations[position_type][i].left
    card.style.bottom = formations[position_type][i].bottom
    if (!e.children[0]) {
      e.appendChild(card.cloneNode(true))
    }
  })
}

createCard()

terrain.addEventListener('click', closeNav)
berger_menu.addEventListener('click', toggle)

function animation_card () {
  Array.from(terrain.children).map(e => {
    e.addEventListener('mouseover', event => {
      event.currentTarget.style.transform = 'scale(1.1, 1.1)'
      event.currentTarget.style.transition = 'scale 1s'
      event.currentTarget.style.filter = 'drop-shadow(0 0 0.5rem #caf0f8)'
      event.currentTarget.style.filter = 'transition: scale 1s ease-in-out  '
    })

    e.addEventListener('mouseout', event => {
      event.currentTarget.style.transform = 'scale(1, 1)'
      event.currentTarget.style.filter = 'drop-shadow(0 0 0)'
    })
  })
}

animation_card()

const toggleForm = event => {
  if (event.currentTarget.value == 'GK') {
    const GK_form = document.getElementById('GK_carater')
    GK_form.classList.replace('hidden', 'grid')
    const player_form = document.getElementById('player_carater')
    player_form.classList.replace('grid', 'hidden')
  } else {
    const GK_form = document.getElementById('GK_carater')
    GK_form.classList.replace('grid', 'hidden')
    const player_form = document.getElementById('player_carater')
    player_form.classList.replace('hidden', 'grid')
  }
}

const validation = (data, keys, position) => {
  const caracter_validation = /^[1-9][0-9]|99$/

  const carater = [
    [
      'rating',
      'pace',
      'shooting',
      'passing',
      'dribbling',
      'defending',
      'physical'
    ],
    [
      'rating',
      'diving',
      'handling',
      'kicking',
      'reflexes',
      'speed',
      'positioning'
    ]
  ]
  const type_car = position == 'GK' ? 1 : 0

  for (const key in keys) {
    if (data[key] != '') {
      validate = true
    } else {
      return (validate = `${key} is not complete`)
    }
  }

  for (let i = 0; i < 7; i++) {
    if (caracter_validation.test(data[carater[type_car][i]])) {
      validate = true
    } else {
      return (validate = `${carater[type_car][i]} is not valide`)
    }
  }
  return validate
}

const handleSubmit = event => {
  const { target } = event
  event.preventDefault()
  const data_create = {}
  const keys = {}
  const position = target[0].value

  for (let index = 0; index < 20; index++) {
    if (position != 'GK' && index < 14) {
      if (index == 3 || index == 6) {
        continue
      }
      keys[target[index].name] = ''
    } else if (position == 'GK') {
      if (index == 3 || index == 6) {
        continue
      }
      index < 9 || index > 13 ? (keys[target[index].name] = '') : ''
    }
  }

  for (const key in keys) {
    data_create[key] = target[key].value
  }

  switch (data_create.position) {
    case 'CB':
      var status =
        data[data_create.position].filter(e => e.active).length === 2
          ? false
          : true
      break
    case 'GK':
      var status = !data[data_create.position].find(e => e.active)
      break
    case 'LB':
      var status = !data[data_create.position].find(e => e.active)
      break
    case 'RB':
      var status = !data[data_create.position].find(e => e.active)
      break
    case 'CM':
      var status =
        data[data_create.position].filter(e => e.active).length === 3
          ? false
          : true
      break
    case 'ST':
      var status = !data[data_create.position]?.find(e => e.active)
      break
    case 'LW':
      var status = !data[data_create.position]?.find(e => e.active)
      break
    case 'RW':
      var status = !data[data_create.position]?.find(e => e.active)
      break
    default:
      break
  }

  const blob = new Blob([target[4].files[0]], { type: 'image/png' })
  data_create['photo'] = URL.createObjectURL(blob)
  data_create['active'] = status
  data_create['id'] = Math.random()

  const isValidat = validation(data_create, keys, position)

  if (isValidat === true) {
    data[data_create.position].push(data_create)
    localStorage.setItem('playersData', JSON.stringify(data))
    for (const key in keys) {
      target[key].value = ''
    }
  } else {
    Swal.fire({
      icon: 'warning',
      title: `${isValidat}`,
      text: isValidat == `${isValidat} is not valide` ? 'test' : '',
      customClass: {
        confirmButton: 'btn-confirm',
        htmlContainer: 'custom-text'
      }
    })
  }
  appendCards()
}

new TomSelect('#select-nation', {
  valueField: 'img',
  labelField: 'name',
  searchField: 'name',
  load: function (query, callback) {
    fetch('./Api/nation.json')
      .then(response => response.json())
      .then(json => {
        callback(json)
      })
      .catch(() => {
        callback()
      })
  },
  render: {
    option: function (item, escape) {
      return `<div class="flex w-ful gap-2 rounded-md ">
                    <img src="${item.img}" alt="" class="w-[2rem] h-[20px] rounded-md" >
                    <h1 class="text-slate-700">${item.name}</h1>
                    </div>`
    },
    item: function (item, escape) {
      return `<div class="flex gap-2 " style="display: flex;align-items: center;">
                    <img src="${item.img}" id="img_selected" alt="" class="Flag w-[2rem] h-[20px] rounded-md" >
                    <span class="text-slate-700 opacity-90">${item.name}</span>
                    </div>`
    }
  }
})

new TomSelect('#select-club', {
  valueField: 'img',
  labelField: 'name',
  searchField: 'name',
  load: function (query, callback) {
    fetch('./Api/teams.json')
      .then(response => response.json())
      .then(json => {
        callback(json)
      })
      .catch(() => {
        callback()
      })
  },
  render: {
    option: function (item, escape) {
      return `<div class="flex w-ful gap-2 rounded-md ">
                    <img src="${item.img}" alt="" class="w-[1.3rem] h-[20px] rounded-md" >
                    <h1 class="text-slate-700">${item.name}</h1>
                    </div>`
    },
    item: function (item, escape) {
      return `<div class="flex gap-2 " style="display: flex;align-items: center;">
                    <img src="${item.img}" id="img_selected" alt="" class="Flag w-[1.3rem] h-[20px] rounded-md" >
                    <span class="text-slate-700 opacity-90">${item.name}</span>
                    </div>`
    }
  }
})
