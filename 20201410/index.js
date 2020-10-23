$(document).ready(() => {
    getGenders();
    getGenders('select');
    getPlaylist();
    getMusic();
    getMusic('checkbox');
    getBand();
    getBand('select');

    $('#form-gender').on('submit', e => {
        e.preventDefault();

        const formGenderData = $('#form-gender').serializeArray();

        $.ajax({
            url: 'postGender.php',
            method: 'POST',
            data: {
                gender: formGenderData[0].value 
            },
            success: () => {
                getGenders();
                $('#gender').val('');
            }
        })
    })

    $('#form-band').on('submit', e => {
        e.preventDefault();

        const formBandData = $('#form-band').serializeArray();

        $.ajax({
            url: 'postBand.php',
            method: 'POST',
            data: {
                band: formBandData[0].value,
                gender: formBandData[1].value
            },
            success: response => {
                getBand();
                $('#band').val('');
            }
        })
    })

    $('#form-playlist').on('submit', e =>{
        e.preventDefault();

        const formPlaylistData = $('#form-playlist').serializeArray();

        const musics = formPlaylistData.filter(item => item.name === 'music');


        $.ajax({
            url: 'postPlaylist.php',
            method: 'POST',
            data: {
                playlist: formPlaylistData[0].value,
                musics
            },
            success: response => {
                getPlaylist();
                $('#playlist').val('');
            }
        })
    })

    $('#form-music').on('submit', e => {
        e.preventDefault();

        const formMusicData = $('#form-music').serializeArray();
       
        $.ajax({
            url: 'postMusic.php',
            method: 'POST',
            data: {
                music: formMusicData[0].value,
                band: formMusicData[1].value,
                description: formMusicData[2].value
            },
            success: () => {
                getMusic();
                $('#music').val('');
            }
        })
    })

    $(document).on('click', '.toggle-modal-playlist', () => {
        $('#modal-playlist').addClass('active');
        
        const id = this.event.target.id;

        populatePlaylistModal(id);
    });

    $('#dismiss-playlist').on('click', () => {
        $('#modal-playlist').removeClass('active');
    });
})

function getMusic(typeStructure = 'list'){
    $.ajax({
        url: 'getMusic.php',
        dataType: 'json',
        success: response => {
            if(typeStructure == 'list'){
                response.map((item, index) => {
                    if(index === 0){
                        $('.list-music').html(`
                            <li> ${item.BAND} - ${item.MUSIC}(${item.GENDER}) </li>
                        `);
                    }
                    else{
                        $('.list-music').append(`
                            <li> ${item.BAND} - ${item.MUSIC}(${item.GENDER}) </li>
                        `)
                    }
                })
            }
            else if(typeStructure == 'checkbox'){
                response.map((item, index) => {
                    if(index === 0){
                        $('.checkbox-wrapper-music').html(`
                        <div>
                            <input 
                                type = "checkbox" 
                                id = music-${item.ID_MUSIC}
                                name = "music"
                                value = ${item.ID_MUSIC}
                            />
                            <label for = music-${item.ID_MUSIC}> ${item.BAND} - ${item.MUSIC}(${item.GENDER}) </label>
                        </div>
                        `);
                    }
                    else{
                        $('.checkbox-wrapper-music').append(`
                        <div>
                        <input 
                            type = "checkbox" 
                            id = music-${item.ID_MUSIC}
                            name = "music"
                            value = ${item.ID_MUSIC}
                        />
                        <label for = music-${item.ID_MUSIC}>  ${item.BAND} - ${item.MUSIC}(${item.GENDER}) </label>
                        </div>
                        `);
                    }
                })
            }
            else{
                response.map((item, index) => {
                    if(index === 0){
                        $('.music-select').html(
                            `<option selected disabled> Selecione uma música</option>`  
                        );
                    }
                    else{
                        $('.music-select').append(`<option value = ${item.ID}> ${item.NOME} </option>`);
                    }
                    
                })
            }    
        }
    })
}

function getPlaylist(typeStructure = 'list'){
    $.ajax({
        url: 'getPlaylist.php',
        dataType: 'json',
        success: response => {
            if(typeStructure == 'list'){
                response.map((item, index) => {
                    if(index === 0){
                        $('.list-playlist').html(`<li id = ${item.ID} class = "toggle-modal-playlist playlist-item"> ${item.NOME} </li>`)
                    }
                    else{
                        $('.list-playlist').append(`<li id = ${item.ID} class = "toggle-modal-playlist playlist-item"> ${item.NOME} </li>`)
                    }
                })
            }
        }
    })
}

function getBand(typeStructure = 'list'){
    $.ajax({
        url: 'getBand.php',
        dataType: 'json',
        success: response => {
            if(typeStructure == 'list'){
                response.map((item, index) => {
                    if(index === 0){
                        $('.list-band').html(`<li> ${item.NOME} </li>`)
                    }
                    else{
                        $('.list-band').append(`<li> ${item.NOME} </li>`)
                    }
                })
            }
            else{
                response.map((item, index) => {
                    if(index === 0){
                        $('.band-select').html(
                            `<option disabled>Selecione uma banda</option>
                            <option value = ${item.ID}> ${item.NOME} </option>`
                        );
                    }
                    else{
                        $('.band-select').append(`<option value = ${item.ID}> ${item.NOME} </option>`);
                    }
                })
            }
        }
    })
}

function getGenders(typeStructure = 'list'){
    $.ajax({
        url: 'getGender.php',
        dataType: 'json',
        success: response => {
            if(typeStructure == 'list'){
                response.map((item, index) => {
                    if(index === 0){
                        $('.list-gender').html(`<li> ${item.NOME} </li>`)
                    }
                    else{
                        $('.list-gender').append(`<li> ${item.NOME} </li>`)
                    }
                })
            }
            else{
                response.map((item, index) => {
                    if(index === 0){
                        $('.gender-select').html(
                            `<option selected disabled>Selecione um genero</option>
                            <option value = ${item.ID}> ${item.NOME} </option>`
                        );
                    }
                    else{
                        $('.gender-select').append(`<option value = ${item.ID}> ${item.NOME} </option>`);
                    }
                })
            }
        }
    })
}

function populatePlaylistModal(id){
    $.ajax({
        url: 'populatePlaylistModal.php',
        method: 'POST',
        data: {
            id
        },
        success: response => {
            console.log(response)
            $('#modal-body-playlist').html(response);
        }
    })
}