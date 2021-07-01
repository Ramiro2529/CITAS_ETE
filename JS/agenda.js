const picker = document.getElementById('fecha');
picker.addEventListener('input', function(e) {
    var day = new Date(this.value).getUTCDay();
    if ([6, 0].includes(day)) {
        e.preventDefault();
        this.value = '';
        alert('Los fin de semana no se puede hacer cita');
    }
});




var horas = ['10:00', '10:10', '10:20', '10:30', '10:40', '10:50', '11:00', '11:10', '11:20', '11:30', '11:40',
    '11:50', '12:00', '12:10', '12:20', '12:30', '12:40', '12:50', '13:00', '13:10', '13:20', '13:30', '13:40', '13:50',
    '14:40', '14:50', '15:00', '15:10', '15:20', '15:30', '15:40', '15:50', '16:00', '16:10', '16:20', '16:30', '16:40', '16:50', '17:00', '17:10', '17:20',
    '17:30', '17:40', '17:50'
];

selectHoras = document.getElementById("hora");
for (let i = 0; i < horas.length; i++) {
    option = document.createElement("option");
    option.value = horas[i];
    option.text = horas[i];
    selectHoras.appendChild(option);
}