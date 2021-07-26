declare const QrcodeVue: import("vue").DefineComponent<{
    readonly renderAs: {
        readonly type: StringConstructor;
        readonly required: false;
        readonly default: "canvas";
        readonly validator: (as: any) => boolean;
    };
    readonly value: {
        readonly type: StringConstructor;
        readonly required: true;
        readonly default: "";
    };
    readonly size: {
        readonly type: NumberConstructor;
        readonly default: 100;
    };
    readonly level: {
        readonly type: StringConstructor;
        readonly default: "H";
        readonly validator: (l: any) => boolean;
    };
    readonly background: {
        readonly type: StringConstructor;
        readonly default: "#fff";
    };
    readonly foreground: {
        readonly type: StringConstructor;
        readonly default: "#000";
    };
    readonly margin: {
        readonly type: NumberConstructor;
        readonly required: false;
        readonly default: 0;
    };
}, unknown, unknown, {}, {}, import("vue").ComponentOptionsMixin, import("vue").ComponentOptionsMixin, Record<string, any>, string, import("vue").VNodeProps & import("vue").AllowedComponentProps & import("vue").ComponentCustomProps, Readonly<{
    value: string;
    size: number;
    level: string;
    background: string;
    foreground: string;
    margin: number;
    renderAs: string;
} & {}>, {
    value: string;
    size: number;
    level: string;
    background: string;
    foreground: string;
    margin: number;
    renderAs: string;
}>;
export default QrcodeVue;
