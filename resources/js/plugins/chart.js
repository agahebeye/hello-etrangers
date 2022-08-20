import {
    Chart, Legend, Title,
    Tooltip,
    DoughnutController, ArcElement,
    Chart, LinearScale, LineElement,
    LineController, CategoryScale, PointElement
} from "chart.js"

Chart.register(
    Legend, Title, Tooltip,
    DoughnutController, ArcElement,
)

Chart.defaults.plugins.title.display = true
