function confirmDatePlugin(pluginConfig) {
	const defaultConfig = {
		confirmIcon: "" ,
		confirmText: "OK",
		showAlways: false,
		theme: "light"
	};

	const config = {};
	for (let key in defaultConfig) {
		config[key] = pluginConfig && pluginConfig[key] !== undefined 
			? pluginConfig[key] 
			: defaultConfig[key];
	}

	return function(fp) {
		const hooks = {
			onKeyDown (_, __, ___, e) {
				if (fp.config.enableTime && e.key === "Tab" && e.target === fp.amPM) {
					e.preventDefault();
					fp.confirmContainer.focus();
				}

				else if (e.key === "Enter" && e.target === fp.confirmContainer)
					fp.close();
			},

			onReady () {
				if (fp.calendarContainer === undefined)
					return;

				fp.confirmContainer = fp._createElement(
					"div", 
					`flatpickr-confirm ${config.showAlways ? "visible" : ""} ${config.theme}Theme`, 
					config.confirmText
				);

				fp.confirmContainer.tabIndex = -1;
				fp.confirmContainer.innerHTML += config.confirmIcon;

				fp.confirmContainer.addEventListener("click", fp.close);
				fp.calendarContainer.appendChild(fp.confirmContainer);
			}
		};

		if (!config.showAlways)
			hooks.onChange = function(dateObj, dateStr) {
				const showCondition = fp.config.enableTime || fp.config.mode === "multiple";
				if(dateStr && !fp.config.inline && showCondition)
					return fp.confirmContainer.classList.add("visible");
				fp.confirmContainer.classList.remove("visible");
			}

		return hooks;
	}
}

if (typeof module !== "undefined")
	module.exports = confirmDatePlugin;
