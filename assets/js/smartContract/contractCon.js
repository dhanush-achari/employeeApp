var contractAddress = "0xc579D68692D13b1847bd5CCBf914BD3808074dB9";
var contractABI = [
	{
		constant: false,
		inputs: [
			{
				internalType: "address",
				name: "_employeeAddress",
				type: "address",
			},
			{
				internalType: "uint256",
				name: "_numberOfPoints",
				type: "uint256",
			},
		],
		name: "distributePoints",
		outputs: [],
		payable: false,
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		constant: true,
		inputs: [
			{
				internalType: "address",
				name: "",
				type: "address",
			},
		],
		name: "creditPoints",
		outputs: [
			{
				internalType: "uint256",
				name: "",
				type: "uint256",
			},
		],
		payable: false,
		stateMutability: "view",
		type: "function",
	},
];

function contractConnect() {
	window.contract = new web3.eth.Contract(contractABI, contractAddress);
}
